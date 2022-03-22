<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv('API_EMAIL'), getenv('API_KEY'));

$inventory = $client->inventory->update(
    $id = 23,
    $data = [
        'name' => 'Inventory Item',
        'inventory_type_id' => 1,
        'part_number' => '1234',
        'sku' => '1234',
        'notes' => 'here are some notes',
        'part_price' => 19.99,
        'location_id' => 1,
        'quantity' => 1
    ]
);

echo json_encode($inventory);
