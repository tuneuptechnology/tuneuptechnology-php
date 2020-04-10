<?php

require 'vendor/autoload.php';

// Setup API credentials
$api_email = getenv("API_EMAIL");
$api_key = getenv("API_KEY");

// Update a customer by ID
$customer = \TuneupTechnology\Customer::update(
    $data = [
        'auth'          => $api_email,
        'api_key'       => $api_key,
        'id'            => 23,
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
