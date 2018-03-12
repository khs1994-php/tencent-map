<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class IPTest extends TencentMapTests
{
    private $output;

    public function getMap()
    {
        return $this->map();
    }

    /**
     * @throws TencentMapError
     */
    public function testExec()
    {
        $this->output = $this->getMap()->ip()->exec('123.206.62.18');
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/ip.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }
}