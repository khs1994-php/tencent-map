<?php

namespace TencentMap\Tests;

use PHPUnit\Framework\TestCase;
use TencentMap\TencentMap;

class TencentMapTests extends TestCase
{
    const APP_KEY = 'GTOBZ-63LW6-7N6SX-MRRVB-LECGJ-RSFVQ';

    private static $map;

    /**
     * @return TencentMap
     */
    public static function map()
    {
        if (!(self::$map instanceof self)) {
            self::$map = TencentMap::tencentMap(self::APP_KEY);
        }

        return self::$map;
    }
}