<?php
namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%session}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $data
 *
 * @property User $user
 */
class Session extends \yii\db\ActiveRecord
{
    const MAX_LIFE_TIME = 604800;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%session}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [[], 'required'],
            [['data'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Renew session
     */
    public function renew()
    {
        $this->updated_at = time();
        $this->save();
    }

    /**
     * Get Responsed data
     * @return array
     */
    public function getResponse()
    {
        return [
            'session_id' => $this->id,
            'username' => $this->user->username,
            'expires_at' => $this->updated_at + self::MAX_LIFE_TIME,
        ];
    }
}
