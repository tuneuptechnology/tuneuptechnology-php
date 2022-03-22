<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv('API_EMAIL'), getenv('API_KEY'));

$ticket = $client->tickets->retrieve(23);

echo json_encode($ticket);
