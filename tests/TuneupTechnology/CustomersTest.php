<?php

namespace TuneupTechnology\Test;

use PHPUnit\Framework\TestCase;
use TuneupTechnology;
use VCR\VCR;

class CustomersTest extends TestCase
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
     * Test creating a customer
     *
     * @return void
     */
    public function testCreate()
    {
        VCR::insertCassette('customers/create.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->create(
            $data = [
                "firstname" => "Jake",
                "lastname" => "Peralta",
                "email" => "jake@example.com",
                "phone" => "8015551234",
                "user_id" => 1,
                "notes" => "Believes he is a good detective.",
                "location_id" => 2,
            ]
        );

        $this->assertEquals($response["firstname"], "Jake");
    }

    /**
     * Test retrieving a customer
     *
     * @return void
     */
    public function testRetrieve()
    {
        VCR::insertCassette('customers/retrieve.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->retrieve(1);

        $this->assertNotNull($response["firstname"]);
    }

    /**
     * Test retrieving all customers
     *
     * @return void
     */
    public function testAll()
    {
        VCR::insertCassette('customers/all.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->all();

        $this->assertGreaterThan(1, $response["data"]);
    }

    /**
     * Test updating a customer
     *
     * @return void
     */
    public function testUpdate()
    {
        VCR::insertCassette('customers/update.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->update(
            $id = 1,
            $data = [
                "firstname" => "Jake",
                "lastname" => "Peralta",
                "email" => "jake@example.com",
                "phone" => "8015551234",
                "user_id" => 1,
                "notes" => "Believes he is a good detective.",
                "location_id" => 2,
            ]
        );

        $this->assertEquals($response["firstname"], "Jake");
    }

    /**
     * Test deleting a customer
     *
     * @return void
     */
    public function testDelete()
    {
        VCR::insertCassette('customers/delete.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->delete(1);

        $this->assertNotNull($response["deleted_at"]);
    }
}
