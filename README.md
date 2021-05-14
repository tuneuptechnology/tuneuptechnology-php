# Tuneup Technology App PHP Client Library

The PHP client library for the Tuneup Technology App.

[![Build Status](https://github.com/tuneuptechnology/tuneuptechnology-php/workflows/build/badge.svg)](https://github.com/tuneuptechnology/tuneuptechnology-php/actions)
[![Licence](https://img.shields.io/github/license/tuneuptechnology/tuneuptechnology-php)](https://opensource.org/licenses/mit-license.php)

The PHP client library allows you to interact with the customers, tickets, inventory, and locations objects without needing to do the hard work of binding your calls and data to endpoints. Simply call an action such as `Customer::create` and pass some data and let the library do the rest.

## Install

```bash
# Install the client library
composer require tuneuptechnology/tuneuptechnology-php

# Install locally
composer install
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

## Development

```bash
# Lint project
./bin/phpcs

# Run tests
./bin/phpunit
```

### Recording VCR Cassettes
* To re-record cassettes, you may need to [remove this line](https://github.com/php-vcr/php-vcr/blob/989fdcad482d830890757b8165127ed0183de41b/src/VCR/Util/HttpClient.php#L26) from the vendored PHP-VCR package. See [this GitHub issue](https://github.com/php-vcr/php-vcr/issues/349) for more details.

## Releasing

1. Update the version variable in `Client.php` & `composer.json`
1. Update CHANGELOG
1. Create a GitHub tag with proper PHP version semantics (eg: v1.0.0)
1. Packagist should automatically have the new version published once tagged in GitHub
