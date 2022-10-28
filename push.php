<?php

declare(strict_types=1);

use Aws\Sqs\SqsClient;
use Ramsey\Uuid\Uuid;

require __DIR__ . '/vendor/autoload.php';

$client = new SqsClient([
    'endpoint' => '', // http://sqs.us-east-1.amazonaws.com
    'region' => '', // us-east-1
    'version' => 'latest',
    'credentials' => [
        'key'    => '',
        'secret' => '',
    ],
]);

$queue = $client->getQueueUrl([
    'QueueName' => (string) $argv[1]
]);

$result = $client->sendMessage([
    'DelaySeconds' => 10,
    'MessageAttributes' => [
        'rr_job' => [
            'DataType' => 'String',
            'StringValue' => 'router'
        ],
        'rr_id' => [
            'DataType' => 'String',
            'StringValue' => (string) Uuid::uuid4()
        ],
        'rr_delay' => [
            'DataType' => 'String',
            'StringValue' => '0'
        ],
        'rr_priority' => [
            'DataType' => 'Number',
            'StringValue' => '10'
        ],
        'rr_headers' => [
            'DataType' => 'Binary',
            'BinaryValue' => json_encode(['instruction' => ['sync_channel_products']])
        ]
    ],
    'MessageBody' => json_encode([
        'channel_products' => [
            [
                'id' => 684017,
                'channel_id' => 197
            ]
        ]
    ]),
    'QueueUrl' => $queue->get('QueueUrl')
]);

echo sprintf('Job `%s` successfully pushed!', $result->get('MessageId'));
