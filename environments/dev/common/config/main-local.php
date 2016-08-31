<?php
$dbName = getenv('DEV_DB_NAME');
$dbUsername = getenv('DEV_DB_USERNAME');
$dbPassword = getenv('DEV_DB_PASSWORD');

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
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
