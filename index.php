<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';

$headers = [
    'x-requested-with' => 'XMLHttpRequest',
];
$client = new Client([
    'base_uri' => 'https://funpay.ru',
    'headers' => $headers,
]);


for ($i = 0; $i < 500; $i++) {
    $result = $client->request('POST', '/yandex/emulator', [
        'form_params' => [
            'receiver' => '410011970792006',
            'sum' => rand(1, 1000),
        ]
    ]);
    $content = $result->getBody()->getContents();

    var_dump(extractData($content), $content);
}


