<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class StreetViewTest extends TencentMapTests
{
    private $output;

    private $name;

    /**
     * @throws TencentMapError
     */
    public function testID()
    {
        $this->name = __FUNCTION__;
        $streetView = $this->map()->streetView();
        $streetView->setID('10011504120403141232200');
        $this->output = $streetView->exec();
    }

    /**
     * @throws TencentMapError
     */
    public function testLocation()
    {
        $this->name = __FUNCTION__;
        $streetView = $this->map()->streetView();
        $streetView->setLocation(39.984154, 116.307490);
        $this->output = $streetView->exec();
    }

    /**
     * @throws TencentMapError
     */
    public function testPoi()
    {
        $this->name = __FUNCTION__;
        $streetView = $this->map()->streetView();
        $streetView->setPoi('16459339205568630404');
        $this->output = $streetView->exec();
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/streetView'.$this->name.'.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }
}
