<?php

use PHPUnit\Framework\TestCase;
use TuneupTechnology\Client;

class TicketsTest extends TestCase
{
    /**
     * Test creating a ticket
     *
     * @vcr tickets/create.yml
     * @return void
     */
    public function testCreate()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $ticket = $client->tickets->create(
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

        $this->assertEquals($ticket->getStatusCode(), 200);
    }

    /**
    * Test retrieving a ticket
    *
    * @vcr tickets/retrieve.yml
    * @return void
    */
    public function testRetrieve()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $ticket = $client->tickets->retrieve(1);

        $this->assertEquals($ticket->getStatusCode(), 200);
    }

    /**
    * Test retrieving all tickets
    *
    * @vcr tickets/all.yml
    * @return void
    */
    public function testAll()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $ticket = $client->tickets->all();

        $this->assertEquals($ticket->getStatusCode(), 200);
    }

    /**
    * Test updating a ticket
    *
    * @vcr tickets/update.yml
    * @return void
    */
    public function testUpdate()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $ticket = $client->tickets->update(
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

        $this->assertEquals($ticket->getStatusCode(), 200);
    }

    /**
    * Test deleting a ticket
    *
    * @vcr tickets/delete.yml
    * @return void
    */
    public function testDelete()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $ticket = $client->tickets->delete(1);

        $this->assertEquals($ticket->getStatusCode(), 200);
    }
}
