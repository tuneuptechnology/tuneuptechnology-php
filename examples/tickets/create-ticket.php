<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv('API_EMAIL'), getenv('API_KEY'));

$ticket = $client->tickets->create(
    $data = [
        'customer_id' => 1,
        'ticket_type_id' => 1,
        'serial' => '10000',
        'user_id' => 1,
        'notes' => 'here are some notes',
        'title' => 'Fancy Title',
        'status' => 1,
        'device' => '2',
        'imei' => 10000,
        'location_id' => 1
    ]
);

echo json_encode($ticket);
