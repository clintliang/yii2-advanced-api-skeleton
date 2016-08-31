<?php
$dotenv = new Dotenv\Dotenv(dirname(dirname(__DIR__)));
$dotenv->load();

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
