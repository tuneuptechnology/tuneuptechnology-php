<?php

namespace TuneupTechnology;

class Client
{
    public $customers;
    public $inventory;
    public $locations;
    public $tickets;

    public function __construct($email = null, $api_key = null, $base_url = 'https://app.tuneuptechnology.com/api', $timeout = 10)
    {
        $this->email = $email;
        $this->api_key = $api_key;
        $this->base_url = $base_url;
        $this->timeout = $timeout;
        $this->version = '2.0.0';
        # TODO: Find a better way to share these class variables across the library
        $this->customers = new Customers($this->email, $this->api_key, $this->base_url, $this->timeout, $this->version);
        $this->inventory = new Inventory($this->email, $this->api_key, $this->base_url, $this->timeout, $this->version);
        $this->locations = new Locations($this->email, $this->api_key, $this->base_url, $this->timeout, $this->version);
        $this->tickets = new Tickets($this->email, $this->api_key, $this->base_url, $this->timeout, $this->version);

        if (!isset($email) or !isset($api_key)) {
            throw new \Exception('email and api_key are required to create a Client.');
        }
    }

    /**
     * Setup the API client
     *
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    public function makeHttpRequest($method, $endpoint, $data = null)
    {
        try {
            $guzzle_client = new \GuzzleHttp\Client();

            $headers = [
                "Accept" => "application/json",
                "User-Agent" => "TuneupTechnologyApp/PHPClient/$this->version",
                "Email" => $this->email,
                "Api-Key" => $this->api_key,
            ];

            $response = $guzzle_client->request(strtoupper($method), $endpoint, [
                'headers' => $headers,
                'timeout' => $this->timeout,
                'json' => $data,
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $error) {
            return json_decode($error->getResponse()->getBody(), $return = true);
        } catch (\GuzzleHttp\Exception\RequestException $error) {
            return json_decode($error->getResponse()->getBody(), $return = true);
        } catch (\Exception $error) {
            return $error;
        }

        return json_decode($response->getBody(), $return = true);
    }
}
