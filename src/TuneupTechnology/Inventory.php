<?php

namespace TuneupTechnology;

use TuneupTechnology;

class Inventory
{
    /**
     * Create an inventory item
     *
     * @param array $data
     * @return mixed
     */
    public static function create($data)
    {
        $endpoint = "inventory/create";
        return Client::response($data, $endpoint);
    }

    /**
     * Retrieve a single inventory record by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function retrieve($data)
    {
        $id = $data['id'];
        $endpoint = "inventory/$id";
        return Client::response($data, $endpoint);
    }

    /**
     * Retrieve a list of all inventory
     *
     * @param array $data
     * @return mixed
     */
    public static function all($data)
    {
        $endpoint = "inventory";
        return Client::response($data, $endpoint);
    }

    /**
     * Update a single inventory item by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function update($data)
    {
        $id = $data['id'];
        $endpoint = "inventory/$id/update";
        return Client::response($data, $endpoint);
    }

    /**
     * Delete a single inventory item by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function delete($data)
    {
        $id = $data['id'];
        $endpoint = "inventory/$id/delete";
        return Client::response($data, $endpoint);
    }
}
