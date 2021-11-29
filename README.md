# Tuneup Technology App PHP Client Library

The PHP client library for the Tuneup Technology App.

[![Build Status](https://github.com/tuneuptechnology/tuneuptechnology-php/workflows/build/badge.svg)](https://github.com/tuneuptechnology/tuneuptechnology-php/actions)
[![Coverage Status](https://coveralls.io/repos/github/tuneuptechnology/tuneuptechnology-php/badge.svg?branch=main)](https://coveralls.io/github/tuneuptechnology/tuneuptechnology-php?branch=main)
[![Packagist](https://img.shields.io/packagist/v/tuneuptechnology/tuneuptechnology-php)](https://packagist.org/packages/tuneuptechnology/tuneuptechnology-php)
[![Licence](https://img.shields.io/github/license/tuneuptechnology/tuneuptechnology-php)](https://opensource.org/licenses/mit-license.php)

The PHP client library allows you to interact with the customers, tickets, inventory, and locations objects without needing to do the hard work of binding your calls and data to endpoints. Simply call an action such as `Customer::create` and pass some data and let the library do the rest.

## Install

```bash
# Install the client library
composer require tuneuptechnology/tuneuptechnology-php
```

## Example

```php
require 'vendor/autoload.php';

$client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"));

$customer = $client->customers->create(
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

echo json_encode($customer);
```

Other examples can be found in the `/examples` directory. Alter according to your needs.

## Usage

```bash
API_EMAIL=email@example.com API_KEY=123... php create-customer.php
```

## Documentation

Up-to-date documentation can be [found here](https://app.tuneuptechnology.com/docs/api).

## Development

```bash
# Install locally
composer install

# Lint project
composer lint

# Run tests (must be run with PHP 7)
API_EMAIL=user@example.com API_KEY=123... composer test
```

## Releasing

1. Update the version variable in `Client.php` & `composer.json`
1. Update CHANGELOG
1. Create a GitHub tag with proper PHP version semantics (eg: v1.0.0)
1. Packagist should automatically have the new version published once tagged in GitHub
