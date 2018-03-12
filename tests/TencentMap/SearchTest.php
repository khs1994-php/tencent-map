<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class SearchTest extends TencentMapTests
{
    private $output;

    private $name;

    private function getMap()
    {
        return $this->map();
    }

    /**
     * @throws TencentMapError
     */
    public function testRegion()
    {
        $this->name = __FUNCTION__;
        $search = $this->getMap()->search();
        $search->setBoundaryRegion('北京', 0);
        $this->output = $search->exec('酒店');
    }

    /**
     * @throws TencentMapError
     */
    public function testNearby()
    {
        $this->name = __FUNCTION__;
        $search = $this->getMap()->search();
        $search->setBoundaryNearby(39.908491, 116.374328, 1000);
        $this->output = $search->exec('酒店');
    }

    /**
     * @throws TencentMapError
     */
    public function testRectangle()
    {
        $this->name = __FUNCTION__;
        $search = $this->getMap()->search();
        $search->setBoundaryRectangle(39.9072, 116.3689, 39.9149, 116.3793);
        $this->output = $search->exec('酒店');
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/search'.$this->name.'json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }
}