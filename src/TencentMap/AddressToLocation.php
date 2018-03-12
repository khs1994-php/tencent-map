<?php

namespace TencentMap;

/**
 * 由地址描述到所述位置坐标的转换.
 *
 * @link http://lbs.qq.com/webservice_v1/guide-geocoder.html
 */
class AddressToLocation
{
    const URL = 'http://apis.map.qq.com/ws/geocoder/v1/';

    /**
     * @param string      $address
     * @param bool        $jsonFormat
     * @param string|null $callback
     *
     * @throws Error\TencentMapError
     *
     * @return mixed
     */
    public function exec(string $address, bool $jsonFormat = true, string $callback = null)
    {
        $output = $jsonFormat ? 'json' : 'jsonp';

        $data = [
            'address' => $address,
            'output' => $output,
            'callback' => $callback,
        ];

        return TencentMap::exec(self::URL, $data);
    }
}
