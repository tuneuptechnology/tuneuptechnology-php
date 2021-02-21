<?php

namespace TuneupTechnology;

use TuneupTechnology;

class Location
{
    /**
     * Create a location
     *
     * @param array $data
     * @return mixed
     */
    public static function create($data)
    {
        $endpoint = "locations/create";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Retrieve a single location record by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function retrieve($data)
    {
        $id = $data['id'];
        $endpoint = "locations/$id";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Retrieve a list of all locations
     *
     * @param array $data
     * @return mixed
     */
    public static function all($data)
    {
        $endpoint = "locations";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Update a single location by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function update($data)
    {
        $id = $data['id'];
        $endpoint = "locations/$id/update";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Delete a single location by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function delete($data)
    {
        $id = $data['id'];
        $endpoint = "locations/$id/delete";
        return Client::make_http_request($data, $endpoint);
    }
}
