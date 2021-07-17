<?php declare(strict_types=1);
include 'vendor/autoload.php';

use Spiral\Database;

$dbal = new Database\DatabaseManager(
    new Database\Config\DatabaseConfig([
        'default'     => 'default',
        'databases'   => [
            'default' => ['connection' => 'sqlite']
        ],
        'connections' => [
            // 'sqlite' => [
            //     'driver'  => Database\Driver\SQLite\SQLiteDriver::class,
            //     'connection' => 'sqlite:database.db',
            //     'username'   => '',
            //     'password'   => '',
            // ]
            'mysql'     => [
                'driver'  => Driver\MySQL\MySQLDriver::class,
                'options' => [
                    'connection' => 'mysql:host=localhost;dbname=opencart_api',
                    'username'   => 'root',
                    'password'   => '',
                ]
            ],
        ]
    ])
);