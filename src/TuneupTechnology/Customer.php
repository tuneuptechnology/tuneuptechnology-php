<?php

namespace TuneupTechnology;

use TuneupTechnology;

class Customer
{
    /**
     * Create a customer
     *
     * @param array $data
     * @return mixed
     */
    public static function create($data)
    {
        $endpoint = "customers/create";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Retrieve a single customer record by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function retrieve($data)
    {
        $id = $data['id'];
        $endpoint = "customers/$id";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Retrieve a list of all customers
     *
     * @param array $data
     * @return mixed
     */
    public static function all($data)
    {
        $endpoint = "customers";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Update a single customer by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function update($data)
    {
        $id = $data['id'];
        $endpoint = "customers/$id/update";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Delete a single customer by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function delete($data)
    {
        $id = $data['id'];
        $endpoint = "customers/$id/delete";
        return Client::make_http_request($data, $endpoint);
    }
}
