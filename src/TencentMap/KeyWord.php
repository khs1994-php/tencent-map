<?php

namespace TencentMap;

/**
 * 用于获取输入关键字的补完与提示，帮助用户快速输入
 *
 * @link http://lbs.qq.com/webservice_v1/guide-suggestion.html
 */
class KeyWord
{
    const URL = 'http://apis.map.qq.com/ws/place/v1/suggestion';

    /**
     * @param string      $keyWord
     * @param string      $city
     * @param bool        $region_fix
     * @param bool        $policy
     * @param string|null $filter
     * @param string|null $orderby
     * @param bool        $jsonFormat
     * @param string|null $callback
     * @return mixed
     * @throws Error\TencentMapError
     */
    public function exec(string $keyWord,
                         string $city,
                         bool $region_fix = true,
                         bool $policy = false,
                         string $filter = null,
                         string $orderby = null,
                         bool $jsonFormat = true,
                         string $callback = null
    )
    {
        $output = $jsonFormat ? 'json' : 'jsonp';

        $data = [
            'keyword' => $keyWord,
            'region' => $city,
            'region_fix' => $region_fix,
            'policy' => $policy,
            'filter' => $filter,
            'orderby' => $orderby,
            'output' => $output,
            'callback' => $callback
        ];

        return TencentMap::exec(self::URL, $data);
    }
}