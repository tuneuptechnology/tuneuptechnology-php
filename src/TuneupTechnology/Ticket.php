<?php

namespace TuneupTechnology;

use TuneupTechnology;

class Ticket
{
    /**
     * Create a ticket
     *
     * @param array $data
     * @return mixed
     */
    public static function create($data)
    {
        $endpoint = "tickets/create";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Retrieve a single ticket record by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function retrieve($data)
    {
        $id = $data['id'];
        $endpoint = "tickets/$id";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Retrieve a list of all tickets
     *
     * @param array $data
     * @return mixed
     */
    public static function all($data)
    {
        $endpoint = "tickets";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Update a single ticket by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function update($data)
    {
        $id = $data['id'];
        $endpoint = "tickets/$id/update";
        return Client::make_http_request($data, $endpoint);
    }

    /**
     * Delete a single ticket by ID
     *
     * @param array $data
     * @return mixed
     */
    public static function delete($data)
    {
        $id = $data['id'];
        $endpoint = "tickets/$id/delete";
        return Client::make_http_request($data, $endpoint);
    }
}
