<?php

return
    ['settings' => [
        // set to false in production
        'displayErrorDetails' => true, //filter_var($_SERVER['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN),
        // Allow the web server to send the content-length header
        'addContentLengthHeader' => false,


        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . $_SERVER['LOG_PATH'] . 'app1.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        'database' => [
          'default' => 'mysql',

        	'connections' => [
        		'sqlite' => array(
        			'driver'   => 'sqlite',
        			'database' => __DIR__ . '/app/storage/db/test.s3db',
        			'prefix'   => '',
        		),

        		'mysql' => array(
        			'driver'    => 'mysql',
        			'host'      => isset($_SERVER['DB_HOST']) ? $_SERVER['DB_HOST'] : 'localhost',
        			'database'  => isset($_SERVER['DB_NAME']) ? $_SERVER['DB_NAME'] : 'test',
        			'username'  => isset($_SERVER['DB_USER']) ? $_SERVER['DB_USER'] : 'root',
        			'password'  => isset($_SERVER['DB_PASS']) ? $_SERVER['DB_PASS'] : '',
        			'charset'   => 'utf8',
        			'collation' => 'utf8_unicode_ci',
        			'prefix'    => '',
        		)
        	]
        ]
]
];


//mysql:host=localhost
