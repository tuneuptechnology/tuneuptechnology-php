<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv('API_EMAIL'), getenv('API_KEY'));

$location = $client->locations->create(
    $data = [
        'name' => 'Location Name',
        'street' => '123 California Ave',
        'city' => 'Salt Lake',
        'state' => 'UT',
        'zip' => 84043
    ]
);

echo json_encode($location);
