<?php

namespace TuneupTechnology\Test;

use PHPUnit\Framework\TestCase;
use TuneupTechnology;

class ClientTest extends TestCase
{
    /**
     * Test that an exception is thrown when no api_email or api_key is set
     *
     * @return void
     */
    public function testExceptionMissingApiEmailOrKey()
    {
        $this->expectExceptionMessage('email and api_key are required to create a Client.');

        new TuneupTechnology\Client();
    }
}
