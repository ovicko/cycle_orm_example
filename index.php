<?php declare(strict_types=1);
include 'vendor/autoload.php';

use Spiral\Database;
use Cycle\ORM;
use Cycle\ORM\Factory;
use Cycle\ORM\Mapper\Mapper;
use Cycle\ORM\Schema;
use Cycle\ORM\Transaction;
use Spiral\Database\Config\DatabaseConfig;
use Spiral\Database\DatabaseManager;
use Spiral\Database\Driver\MySQL\MySQLDriver;
use Cycle\Annotated;
use Doctrine\Common\Annotations\AnnotationRegistry;

use Ovicko\CycleOrmExample\AgentLevel;

$dbal = new DatabaseManager(
    new DatabaseConfig([
        'default'     => 'default',
        'databases'   => [
            'default' => [
                'connection' => 'mysql',
                'prefix'         => 'oc_'
            ]
        ],
        'connections' => [
            'mysql'     => [
                'driver'  => MySQLDriver::class,
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
$orm = new ORM\ORM(new Factory($dbal));

$orm = $orm->withSchema(new Schema([
    'level' => [
        Schema::MAPPER      => Mapper::class, // default POPO mapper
        Schema::ENTITY      => AgentLevel::class,
        Schema::DATABASE    => 'default',
        Schema::TABLE       => 'agent_level',
        Schema::PRIMARY_KEY => 'id',
        Schema::COLUMNS     => [
            'id'   => 'id',  // property => column
            'name' => 'level_name',
            'status' => 'status',
            'rate' => 'commission_rate'
        ],
        Schema::TYPECAST    => [
            'id' => 'int',
            'level_name' => 'string',
            'status' => 'int',
            'commission_rate' => 'double'
        ],
        Schema::RELATIONS   => []
    ]
]));

$user = new AgentLevel();
$user->setName("Level One");
$user->setRate(5.5);
$user->setStatus(1);

$tr = new Transaction($orm);
$tr->persist($user);

try {
    $tr->run();
} catch (\Throwable $e) {
    print_r($e);
}
