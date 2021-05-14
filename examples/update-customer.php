<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"));

$customer = $client->customers->update(
    $id = 23,
    $data = [
        "firstname"     => "Jake",
        "lastname"      => "Peralta",
        "email"         => "jake@example.com",
        "phone"         => "8015551234",
        "user_id"       => 1,
        "notes"         => "Believes he is a good detective.",
        "location_id"   => 2,
    ]
);

echo $customer->getBody();
