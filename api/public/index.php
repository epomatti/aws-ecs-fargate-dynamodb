<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpBadRequestException;
use Aws\DynamoDb\DynamoDbClient;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

$sharedConfig = [
    'profile' => 'default',
    'region' => 'sa-east-1',
    'version' => 'latest'
];

$app = AppFactory::create();
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->post('/tasks', function (Request $request, Response $response, array $args) use ($sharedConfig) {

    $json = $request->getBody();
    $data = json_decode($json, true);

    $title = $data['title'];

    if (is_null($title) or empty($title)) {
        throw new HttpBadRequestException($request, "Title is mandatory");
    }

    $id = uniqid();
    $client = new DynamoDbClient($sharedConfig);
    $client->putItem([
        'Item' => [
            'Id' => [
                'S' => $id,
            ],
            'Title' => [
                'S' => $title,
            ],
        ],
        'TableName' => 'Tasks',
    ]);

    $response->getBody()->write($id);
    return $response;
});

$app->run();
