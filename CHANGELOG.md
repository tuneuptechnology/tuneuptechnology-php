# CHANGELOG

## v2.0.0 (2021-06-11)

* Updates entire library to be compliant with the new `v2` API (endpoints, HTTP methods, etc)
* Build requests via a `Client` now providing your email and api_key
* Added optional `base_url` and `timeout` options to client
* Module names are now plural
* The Client now checks if an email and api_key is provided and raises an error if not
* Bumped dependencies (drop php 7.2, adds php 8), dropped `php-cs-fixer` and replaced it with `php_codesniffer` and linted project
* Added unit tests (closes #1)

## v1.1.0 (2021-02-20)

* Adds timeout to HTTP requests
* Renames `response` to `make_http_request`

## v1.0.0 (2020-04-10)

* Initial release
* Added customer, inventory, location, and ticket functions
* Added documentation and code examples
