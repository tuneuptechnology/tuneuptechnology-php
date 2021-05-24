<?php

namespace TuneupTechnology;

use PHPUnit\Framework\TestCase;
use VCR\VCR;
use TuneupTechnology;

class TicketsTest extends TestCase
{
    /**
     * Set up VCR before running tests in this file
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        VCR::turnOn();
    }

    /**
     * Spin down VCR after running tests
     *
     * @return void
     */
    public static function tearDownAfterClass(): void
    {
        VCR::eject();
        VCR::turnOff();
    }

    /**
     * Test creating a ticket
     *
     * @return void
     */
    public function testCreate()
    {
        VCR::insertCassette('tickets/create.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->tickets->create(
            $data = [
                "customer_id" => 2,
                "ticket_type_id" => 1,
                "serial" => "10000",
                "user_id" => 1,
                "notes" => "here are some notes",
                "title" => "Fancy Title",
                "status" => 1,
                "device" => "2",
                "imei" => 10000,
                "location_id" => 2
            ]
        );

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving a ticket
    *
    * @return void
    */
    public function testRetrieve()
    {
        VCR::insertCassette('tickets/retrieve.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->tickets->retrieve(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving all tickets
    *
    * @return void
    */
    public function testAll()
    {
        VCR::insertCassette('tickets/all.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->tickets->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test updating a ticket
    *
    * @return void
    */
    public function testUpdate()
    {
        VCR::insertCassette('tickets/update.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->tickets->update(
            $id = 1,
            $data = [
                "customer_id" => 2,
                "ticket_type_id" => 1,
                "serial" => "10000",
                "user_id" => 1,
                "notes" => "here are some notes",
                "title" => "Fancy Title",
                "status" => 1,
                "device" => "2",
                "imei" => 10000,
                "location_id" => 2
            ]
        );

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test deleting a ticket
    *
    * @return void
    */
    public function testDelete()
    {
        VCR::insertCassette('tickets/delete.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->tickets->delete(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
