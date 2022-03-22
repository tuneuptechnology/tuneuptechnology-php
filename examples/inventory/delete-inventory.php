<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv('API_EMAIL'), getenv('API_KEY'));

$inventory = $client->inventory->delete(23);

echo json_encode($inventory);
