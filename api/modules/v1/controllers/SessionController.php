<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\web\UnauthorizedHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\auth\HttpBearerAuth;
use common\models\LoginForm;
use common\models\Session;

/**
 * Session Controller API
 *
 * @author Clint Liang <clintliang@gmail.com>
 * @package api\modules\v1\controllers
 */
class SessionController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'only' => ['delete'],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }

    /**
     * @return string AuthKey or model with errors
     */
    public function actionCreate()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            $session = Session::find(['user_id' => $model->user->id])->one();
            if (isset($session)) {
                $session->renew();
            } else {
              $session = new Session();
              $session->user_id = $model->user->id;
              $data = [
                  'ip' => Yii::$app->request->userIP
              ];
              $session->data = json_encode($data);
              $session->save();
            }
            return [
                'session' => $session->response,
                'access_token' => \Yii::$app->user->identity->getAuthKey()
            ];
        } else {
           throw new UnauthorizedHttpException('Unauthorized.');
        }
    }

    /**
     * @return string AuthKey or model with errors
     */
    public function actionDelete()
    {
        $user = Yii::$app->user->identity;
        $session = Session::find(['user_id' => $user->id])->one();
        if (!isset($session)) {
            throw new NotFoundHttpException('Session not found.');
        }
        if (!$session->delete()) {
            throw new ServerErrorHttpException('Fail to destory session.');
        }
        return ['success' => true];
    }
}
