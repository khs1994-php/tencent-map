<?php

namespace TencentMap;

/**
 * 通过终端设备IP地址获取其当前所在地理位置，精确到市级，常用于显示当地城市天气预报、初始化用户城市等非精确定位场景。
 *
 * @link http://lbs.qq.com/webservice_v1/guide-ip.html
 */
class IP
{
    const URL = 'http://apis.map.qq.com/ws/location/v1/ip';

    /**
     * @param string      $ip
     * @param bool        $jsonFormat
     * @param string|null $callback
     * @return mixed
     * @throws Error\TencentMapError
     */
    public function exec(string $ip, bool $jsonFormat = true, string $callback = null)
    {
        $output = $jsonFormat ? 'json' : 'jsonp';
        $data = [
            'ip' => $ip,
            'output' => $output,
            'callback' => $callback,
        ];

        return TencentMap::exec(self::URL, $data);

    }
}