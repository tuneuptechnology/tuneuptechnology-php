<?php

namespace TuneupTechnology;

use PHPUnit\Framework\TestCase;
use TuneupTechnology;

class InventoryTest extends TestCase
{
    /**
     * Test creating an inventory item
     *
     * @vcr inventory/create.yml
     * @return void
     */
    public function testCreate()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->create(
            $data = [
                "name" => "Inventory Item",
                "inventory_type_id" => 1,
                "part_number" => "1234",
                "sku" => "1234",
                "notes" => "here are some notes",
                "part_price" => 19.99,
                "location_id" => 1,
                "quantity" => 1
            ]
        );

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving an inventory item
    *
    * @vcr inventory/retrieve.yml
    * @return void
    */
    public function testRetrieve()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->retrieve(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test retrieving all inventory items
    *
    * @vcr inventory/all.yml
    * @return void
    */
    public function testAll()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test updating an inventory item
    *
    * @vcr inventory/update.yml
    * @return void
    */
    public function testUpdate()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->update(
            $id = 1,
            $data = [
                "name" => "Inventory Item",
                "inventory_type_id" => 1,
                "part_number" => "1234",
                "sku" => "1234",
                "notes" => "here are some notes",
                "part_price" => 19.99,
                "location_id" => 1,
                "quantity" => 1
            ]
        );

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    * Test deleting an inventory item
    *
    * @vcr inventory/delete.yml
    * @return void
    */
    public function testDelete()
    {
        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->delete(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
