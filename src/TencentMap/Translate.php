<?php

namespace TencentMap;

use TencentMap\Error\TencentMapError;

/**
 * 其他地图服务商坐标转腾讯坐标
 *
 * @link http://lbs.qq.com/webservice_v1/guide-convert.html
 */
class Translate
{
    const URL = 'http://apis.map.qq.com/ws/coord/v1/translate';

    private $type;

    public function isGPS(): void
    {
        $this->type = 1;
    }

    public function isSougou(): void
    {
        $this->type = 2;
    }

    public function isBaidu(): void
    {
        $this->type = 3;
    }

    public function isMapbar(): void
    {
        $this->type = 4;
    }

    public function isDefault(): void
    {
        $this->type = 5;
    }

    public function isMoKaTuoSougou(): void
    {
        $this->type = 6;
    }

    /**
     * @param string      $locations
     * @param bool        $jsonFormat
     * @param string|null $callback
     * @return TencentMap
     * @throws TencentMapError
     */
    public function exec(string $locations, bool $jsonFormat = true, string $callback = null)
    {
        $output = $jsonFormat ? 'json' : 'jsonp';

        if (!($this->type)) {
            throw new TencentMapError(null, 301);
        }
        $data = [
            'locations' => $locations,
            'type' => $this->type,
            'output' => $output,
            'callback' => $callback,
        ];

        return TencentMap::exec(self::URL, $data);

    }
}