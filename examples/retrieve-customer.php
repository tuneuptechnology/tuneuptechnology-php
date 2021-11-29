<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"));

$customer = $client->customers->retrieve(23);

echo json_encode($customer);
