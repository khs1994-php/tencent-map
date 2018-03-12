<?php

namespace TencentMap;

/**
 * 坐标转地址
 *
 * @link  http://lbs.qq.com/webservice_v1/guide-gcoder.html
 */
class LocationToAddress
{
    const URL = 'http://apis.map.qq.com/ws/geocoder/v1/';

    /**
     * @param string      $location
     * @param int         $coord_type
     * @param bool        $get_poi
     * @param string      $poi_options
     * @param int         $policy
     * @param int         $page_size
     * @param int         $page_index
     * @param string      $jsonFormat
     * @param string|null $callback
     *
     * @throws Error\TencentMapError
     *
     * @return mixed
     */
    public function exec(string $location,
                         int $coord_type = 5,
                         bool $get_poi = true,
                         string $poi_options = null,
                         int $policy = 1,
                         int $page_size = 20,
                         int $page_index = 1,
                         string $jsonFormat = 'json',
                         string $callback = null)
    {
        $output = $jsonFormat ? 'json' : 'jsonp';

        $data = [
            'location' => $location,
            'coord_type' => $coord_type,
            'get_poi' => $get_poi,
            'poi_options' => $poi_options,
            'page_size' => $page_size,
            'page_index' => $page_index,
            'policy' => $policy,
            'output' => $output,
            'callback' => $callback,
        ];

        return TencentMap::exec(self::URL, $data);
    }
}
