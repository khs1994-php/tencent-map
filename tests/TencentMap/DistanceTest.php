<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class DistanceTest extends TencentMapTests
{
    private $output;

    private $name;

    public function getMap()
    {
        return $this->map();
    }

    /**
     * @throws TencentMapError
     */
    public function testSetModeDriving()
    {
        $this->name = 'Driving';
        $distance = $this->getMap()->distance();
        $distance->setModeDriving();
        $this->output = $distance->exec(["39.996059,116.353454"], ["39.983171,116.308479", "39.949226,116.394309"]);
    }

    /**
     * @throws TencentMapError
     */
    public function testSetModeWalking()
    {
        $this->name = 'Walking';
        $distance = $this->getMap()->distance();
        $distance->setModeWalking();
        $this->output = $distance->exec(["39.996059,116.353454"], ["39.983171,116.308479", "39.949226,116.394309"]);
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/distance'.$this->name.'.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }


}