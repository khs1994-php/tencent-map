<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class KeyWordTest extends TencentMapTests
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
        $this->output = $this->getMap()->keyWord()->exec('酒店', '北京');
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/keyWord.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }
}