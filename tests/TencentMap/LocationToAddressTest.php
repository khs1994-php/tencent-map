<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class LocationToAddressTest extends TencentMapTests
{
    private $output;

    private function getMap()
    {
        return $this->map();
    }

    /**
     * @throws TencentMapError
     */
    public function testExec()
    {
        $this->output = $this->getMap()->locationToAddress()->exec('39.984154,116.307490');
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/locationToAddress.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }
}