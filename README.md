# Tuneup Technology App PHP Client Library

The PHP client library for the Tuneup Technology App.

[![Build Status](https://travis-ci.com/ncr4/tuneuptechnology-php.svg?branch=master)](https://travis-ci.com/ncr4/tuneuptechnology-php)
[![MIT Licence](https://badges.frapsoft.com/os/mit/mit.svg?v=103)](https://opensource.org/licenses/mit-license.php)

The PHP client library allows you to interact with the customers, tickets, inventory, and locations objects without needing to do the hard work of binding your calls and data to endpoints. Simply call an action such as `Customer::create` and pass some data and let the library do the rest.

## Install

```bash
composer require ncr4/tuneuptechnology-php
```

## Example

```php
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
```

Other examples can be found in the `/examples` directory. Alter according to your needs.

## Usage

```bash
API_EMAIL=email@example.com API_KEY=123... php create-customer.php
```

## Documentation

Up-to-date documentation can be [found here](https://app.tuneuptechnology.com/docs/api).

## Releasing

1. Update the version variable in `Client.php` & `composer.json`
1. Update CHANGELOG
1. Create a GitHub tag with proper PHP version semantics (eg: v1.0.0)
1. Packagist should automatically have the new version published once tagged in GitHub
