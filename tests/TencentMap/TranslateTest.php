<?php

namespace TencentMap\Tests;

use TencentMap\Error\TencentMapError;

class TranslateTest extends TencentMapTests
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
        $translate = $this->getMap()->translate();
        $translate->isDefault();
        $this->output = $translate->exec('39.12,116.83;30.21,115.43');
    }

    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/translate.json', $this->output);
        $this->assertEquals(0, json_decode($this->output)->status);
    }
}