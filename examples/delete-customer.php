<?php

require 'vendor/autoload.php';

// Setup API credentials
$api_email = getenv("API_EMAIL");
$api_key = getenv("API_KEY");

// Delete a customer by ID
$customer = \TuneupTechnology\Customer::delete(
    $data = [
        'auth'      => $api_email,
        'api_key'   => $api_key,
        'id'        => 23,
    ]
);

echo $customer;
