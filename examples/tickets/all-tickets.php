<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv('API_EMAIL'), getenv('API_KEY'));

$tickets = $client->tickets->all();

echo json_encode($tickets);
