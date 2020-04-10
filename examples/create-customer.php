<?php

require 'vendor/autoload.php';

// Setup API credentials
$api_email = getenv("API_EMAIL");
$api_key = getenv("API_KEY");

// Create a customer with all required data
$customer = \TuneupTechnology\Customer::create(
    $data = [
        'auth'          => $api_email,
        'api_key'       => $api_key,
        "firstname"     => "Jake",
        "lastname"      => "Smith",
        "email"         => "jsmith@gmail.com",
        "phone"         => "8015551234",
        "user_id"       => 1,
        "notes"         => "here are some notes",
        "location_id"   => 1
    ]
);

echo $customer;
