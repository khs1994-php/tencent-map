<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class StaticStreetViewTest extends TencentMapTests
{
    private $output;

    private $name;

    /**
     * @throws TencentMapError
     */
    public function testLocation()
    {
        $this->name = __FUNCTION__;
        $staticStreetView = $this->map()->staticStreetView();
        $staticStreetView->setLocation('39.12,116.83');
        $this->output = $staticStreetView->exec();
    }

    /**
     * @throws TencentMapError
     */
    public function testPano()
    {
        $this->name = __FUNCTION__;
        $staticStreetView = $this->map()->staticStreetView();
        $staticStreetView->setPano('10011022120723095812200');
        $this->output = $staticStreetView->exec();
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/staticStreetView'.$this->name.'.json', $this->output);
        $this->assertEquals(113, json_decode($this->output)->status);
    }
}