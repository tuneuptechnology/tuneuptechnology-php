<?php

namespace TuneupTechnology;

use TuneupTechnology;

class Customers extends Client
{
    public function __construct($email, $api_key, $base_url, $timeout, $version)
    {
        # TODO: Find a better way to share these class variables across the library
        $this->email = $email;
        $this->api_key = $api_key;
        $this->base_url = $base_url;
        $this->timeout = $timeout;
        $this->version = $version;
    }

    /**
     * Create a customer
     *
     * @param array $data
     * @return mixed
     */
    public function create($data)
    {
        $endpoint = "$this->base_url/customers";
        return $this->makeHttpRequest('post', $endpoint, $data);
    }

    /**
     * Retrieve a single customer record by ID
     *
     * @param int $id
     * @return mixed
     */
    public function retrieve($id)
    {
        $endpoint = "$this->base_url/customers/$id";
        return $this->makeHttpRequest('get', $endpoint);
    }

    /**
     * Retrieve a list of all customers
     *
     * @return mixed
     */
    public function all()
    {
        $endpoint = "$this->base_url/customers";
        return $this->makeHttpRequest('get', $endpoint);
    }

    /**
     * Update a single customer by ID
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $endpoint = "$this->base_url/customers/$id";
        return $this->makeHttpRequest('patch', $endpoint, $data);
    }

    /**
     * Delete a single customer by ID
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        $endpoint = "$this->base_url/customers/$id";
        return $this->makeHttpRequest('delete', $endpoint);
    }
}
