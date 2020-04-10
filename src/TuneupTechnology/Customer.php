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
        return Client::response($data, $endpoint);
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
        return Client::response($data, $endpoint);
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
        return Client::response($data, $endpoint);
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
        return Client::response($data, $endpoint);
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
        return Client::response($data, $endpoint);
    }
}
