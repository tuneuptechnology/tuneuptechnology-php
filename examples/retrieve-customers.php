<?php

require 'vendor/autoload.php';

// Setup API credentials
$api_email = getenv("API_EMAIL");
$api_key = getenv("API_KEY");

// Retrieve all customers
$customers = \TuneupTechnology\Customer::all(
    $data = [
        'auth'      => $api_email,
        'api_key'   => $api_key,
    ]
);

echo $customers;
