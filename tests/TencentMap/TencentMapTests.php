<?php

namespace TencentMap\Tests;

use TencentMap\TencentMap;
use PHPUnit\Framework\TestCase;

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
