<?php declare(strict_types=1);
include 'vendor/autoload.php';

use Spiral\Database;
use Cycle\ORM;

$dbal = new Database\DatabaseManager(
    new Database\Config\DatabaseConfig([
        'default'     => 'default',
        'databases'   => [
            'default' => [
                'connection' => 'mysql',
                'prefix'         => 'oc_'
            ]
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

// print_r($dbal->database('default')->getTables());
//test database access
// $customers = $dbal->database('default')->table('customer')->select()->fetchAll();

// foreach ($customers as $customer) {
//     // print_r($customer);
//     print_r($customer['customer_id'] . " " . $customer['firstname'] . " " . $customer['lastname']);
//     print_r("\n");
// }

//initiate ORM Service
$orm = new ORM\ORM(new ORM\Factory($dbal));


