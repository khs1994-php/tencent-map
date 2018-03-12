<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class AddressToLocationTest extends TencentMapTests
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
        $this->output = $this->getMap()->addressToLocation()->exec('北京市海淀区彩和坊路海淀西大街74号');
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/addressToLocation.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }

}