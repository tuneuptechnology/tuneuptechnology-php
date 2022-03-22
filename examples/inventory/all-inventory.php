<?php

require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv('API_EMAIL'), getenv('API_KEY'));

$inventorys = $client->inventory->all();

echo json_encode($inventorys);
