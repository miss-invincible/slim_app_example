<?php
return [
    'settings' => [
        'displayErrorDetails' => true,
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '../templates/',
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
        //database settings
        'dbSettings' => array(
            'db' =>
                array(
                    'host' => 'localhost',
                    'user' => 'root',
                    'pass' => 'shmily',
                    'dbname' => 'connect_me'
                ),
        )
    ],
];