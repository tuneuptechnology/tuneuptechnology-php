<?php

use PHPUnit\Framework\TestCase;

class CustomersTest extends TestCase
{
    /**
     * Test creating a customer
     *
     * @vcr customers/create.yml
     * @return void
     */
    public function testCreate()
    {
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

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving a customer
    *
    * @vcr customers/retrieve.yml
    * @return void
    */
    public function testRetrieve()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->retrieve(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving all customers
    *
    * @vcr customers/all.yml
    * @return void
    */
    public function testAll()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test updating a customer
    *
    * @vcr customers/update.yml
    * @return void
    */
    public function testUpdate()
    {
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

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test deleting a customer
    *
    * @vcr customers/delete.yml
    * @return void
    */
    public function testDelete()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->customers->delete(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
