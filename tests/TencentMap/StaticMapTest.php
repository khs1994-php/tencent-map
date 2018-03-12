<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class StaticMapTest extends TencentMapTests
{
    private $output;

    /**
     * @throws TencentMapError
     */
    public function testPNG()
    {
        if (is_file(__DIR__.'/../output/staticMap.png')) {
            unlink(__DIR__.'/../output/staticMap.png');
        }

        $static = $this->map()->staticMap();
        $static->setFormatPNG();
        $this->output = $static->exec('39.12,116.54');
        file_put_contents(__DIR__.'/../output/staticMap.png', $this->output);

        $this->assertFileExists(__DIR__.'/../output/staticMap.png');
    }

    /**
     * @throws TencentMapError
     */
    public function testPNG8()
    {
        if (is_file(__DIR__.'/../output/staticMap8.png')) {
            unlink(__DIR__.'/../output/staticMap8.png');
        }

        $static = $this->map()->staticMap();
        $static->setFormatPNG8();
        $this->output = $static->exec('39.12,116.54');
        file_put_contents(__DIR__.'/../output/staticMap8.png', $this->output);

        $this->assertFileExists(__DIR__.'/../output/staticMap8.png');
    }

    /**
     * @throws TencentMapError
     */
    public function testGIF()
    {
        if (is_file(__DIR__.'/../output/staticMap.gif')) {
            unlink(__DIR__.'/../output/staticMap.gif');
        }

        $static = $this->map()->staticMap();
        $static->setFormatGIF();
        $this->output = $static->exec('39.12,116.54');
        file_put_contents(__DIR__.'/../output/staticMap.gif', $this->output);

        $this->assertFileExists(__DIR__.'/../output/staticMap.gif');
    }

    /**
     * @throws TencentMapError
     */
    public function testJPG()
    {
        if (is_file(__DIR__.'/../output/staticMap.jpg')) {
            unlink(__DIR__.'/../output/staticMap.jpg');
        }

        $static = $this->map()->staticMap();
        $static->setFormatJPG();
        $this->output = $static->exec('39.12,116.54');
        file_put_contents(__DIR__.'/../output/staticMap.jpg', $this->output);

        $this->assertFileExists(__DIR__.'/../output/staticMap.jpg');
    }
}