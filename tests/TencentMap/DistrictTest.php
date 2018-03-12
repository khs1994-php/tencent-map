<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class DistrictTest extends TencentMapTests
{
    private $name;

    private $output;

    public function getMap()
    {
        return $this->map();
    }

    /**
     * @throws TencentMapError
     */
    public function testList()
    {
        $this->name = __FUNCTION__;

        $this->output = $this->getMap()->district()->list();
    }

    /**
     * @throws TencentMapError
     */
    public function testChildren()
    {
        $this->name = __FUNCTION__;
        $this->output = $this->getMap()->district()->getChildren(110000);
    }

    /**
     * @throws TencentMapError
     */
    public function testSearch()
    {
        $this->name = __FUNCTION__;
        $this->output = $this->getMap()->district()->search('香格里拉');
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/district'.$this->name.'.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }

}