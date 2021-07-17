<?php declare(strict_types=1);
include 'vendor/autoload.php';

use Spiral\Database;

$dbal = new Database\DatabaseManager(
    new Database\Config\DatabaseConfig([
        'default'     => 'default',
        'databases'   => [
            'default' => ['connection' => 'mysql']
        ],
        'connections' => [
            'mysql'     => [
                'driver'  => Database\Driver\MySQL\MySQLDriver::class,
                'options' => [
                    'connection' => 'mysql:host=localhost;dbname=opencart_api',
                    'username'   => 'root',
                    'password'   => '',
                ]
            ],
        ]
    ])
);

print_r($dbal->database('default')->getTables());
