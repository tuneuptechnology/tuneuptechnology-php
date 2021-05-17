<?php

use PHPUnit\Framework\TestCase;

class LocationsTest extends TestCase
{
    /**
     * Test creating a location
     *
     * @vcr locations/create.yml
     * @return void
     */
    public function testCreate()
    {
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

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving a location
    *
    * @vcr locations/retrieve.yml
    * @return void
    */
    public function testRetrieve()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->retrieve(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving all locations
    *
    * @vcr locations/all.yml
    * @return void
    */
    public function testAll()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test updating a location
    *
    * @vcr locations/update.yml
    * @return void
    */
    public function testUpdate()
    {
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

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test deleting a location
    *
    * @vcr locations/delete.yml
    * @return void
    */
    public function testDelete()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->locations->delete(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
