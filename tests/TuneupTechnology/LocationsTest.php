<?php

namespace TuneupTechnology\Test;

use PHPUnit\Framework\TestCase;
use TuneupTechnology;
use VCR\VCR;

class LocationsTest extends TestCase
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
     * Test creating a location
     *
     * @return void
     */
    public function testCreate()
    {
        VCR::insertCassette('locations/create.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->create(
            $data = [
                "name" => "Location Name",
                "street" => "123 California Ave",
                "city" => "Salt Lake",
                "state" => "UT",
                "zip" => 84043
            ]
        );

        $this->assertEquals($response["name"], "Location Name");
    }

    /**
     * Test retrieving a location
     *
     * @return void
     */
    public function testRetrieve()
    {
        VCR::insertCassette('locations/retrieve.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->retrieve(1);

        $this->assertNotNull($response["name"]);
    }

    /**
     * Test retrieving all locations
     *
     * @return void
     */
    public function testAll()
    {
        VCR::insertCassette('locations/all.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->all();

        $this->assertGreaterThan(1, $response["data"]);
    }

    /**
     * Test updating a location
     *
     * @return void
     */
    public function testUpdate()
    {
        VCR::insertCassette('locations/update.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->update(
            $id = 1,
            $data = [
                "name" => "Location Name",
                "street" => "123 California Ave",
                "city" => "Salt Lake",
                "state" => "UT",
                "zip" => 84043
            ]
        );

        $this->assertEquals($response["name"], "Location Name");
    }

    /**
     * Test deleting a location
     *
     * @return void
     */
    public function testDelete()
    {
        VCR::insertCassette('locations/delete.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->delete(1);

        $this->assertNotNull($response["deleted_at"]);
    }
}
