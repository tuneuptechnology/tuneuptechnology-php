<?php

namespace TuneupTechnology\Test;

use PHPUnit\Framework\TestCase;
use TuneupTechnology;
use VCR\VCR;

class InventoryTest extends TestCase
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
     * Test creating an inventory item
     *
     * @return void
     */
    public function testCreate()
    {
        VCR::insertCassette('inventory/create.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->create(
            $data = [
                "name" => "Inventory Item",
                "inventory_type_id" => 1,
                "part_number" => "1234",
                "sku" => "1234",
                "notes" => "here are some notes",
                "part_price" => "19.99",
                "location_id" => 1,
                "quantity" => 1
            ]
        );

        $this->assertEquals($response["name"], "Inventory Item");
    }

    /**
     * Test retrieving an inventory item
     *
     * @return void
     */
    public function testRetrieve()
    {
        VCR::insertCassette('inventory/retrieve.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->retrieve(1);

        $this->assertNotNull($response["name"]);
    }

    /**
     * Test retrieving all inventory items
     *
     * @return void
     */
    public function testAll()
    {
        VCR::insertCassette('inventory/all.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->all();

        $this->assertGreaterThan(1, $response["data"]);
    }

    /**
     * Test updating an inventory item
     *
     * @return void
     */
    public function testUpdate()
    {
        VCR::insertCassette('inventory/update.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->update(
            $id = 1,
            $data = [
                "name" => "Inventory Item",
                "inventory_type_id" => 1,
                "part_number" => "1234",
                "sku" => "1234",
                "notes" => "here are some notes",
                "part_price" => "19.99",
                "location_id" => 1,
                "quantity" => 1
            ]
        );

        $this->assertEquals($response["name"], "Inventory Item");
    }

    /**
     * Test deleting an inventory item
     *
     * @return void
     */
    public function testDelete()
    {
        VCR::insertCassette('inventory/delete.yml');

        $client = new TuneupTechnology\Client(getenv("API_EMAIL"), getenv("API_KEY"), 'http://tuneapp.localhost/api');

        $response = $client->inventory->delete(1);

        $this->assertNotNull($response["deleted_at"]);
    }
}
