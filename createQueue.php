<?php

declare(strict_types=1);

use Aws\Sqs\SqsClient;

require __DIR__ . '/vendor/autoload.php';

$client = new SqsClient([
    'region' => '',
    'version' => 'latest',
    'credentials' => [
        'key'    => '',
        'secret' => '',
    ],
]);

$result = $client->createQueue([
    'QueueName' => (string) $argv[1],
]);

echo sprintf('Queue `%s` successfully created!', (string) $argv[1]);
