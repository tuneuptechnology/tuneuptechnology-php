<?php

// Require this file if you're not using composer's vendor/autoload

// Required PHP extensions
if (!function_exists('curl_init')) {
    throw new Exception('TuneupTechnology needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
    throw new Exception('TuneupTechnology needs the JSON PHP extension.');
}

// Import the client library files
require_once(dirname(__FILE__) . '/TuneupTechnology/Client.php');
require_once(dirname(__FILE__) . '/TuneupTechnology/Customer.php');
require_once(dirname(__FILE__) . '/TuneupTechnology/Inventory.php');
require_once(dirname(__FILE__) . '/TuneupTechnology/Location.php');
require_once(dirname(__FILE__) . '/TuneupTechnology/Ticket.php');
