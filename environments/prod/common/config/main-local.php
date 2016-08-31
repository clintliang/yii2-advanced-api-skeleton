<?php
$dbName = getenv('PROD_DB_NAME');
$dbUsername = getenv('PROD_DB_USERNAME');
$dbPassword = getenv('PROD_DB_PASSWORD');

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => "pgsql:host=localhost;port=5432;dbname=$dbName",
            'username' => $dbUsername,
            'password' => $dbPassword,
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
