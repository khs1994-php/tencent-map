<?php

namespace TencentMap;

/**
 * 单起点到多终点，或多起点到单终点的路线距离（非直线距离）计算
 *
 * 起点到终点最大限制直线距离10公里
 *
 * @link http://lbs.qq.com/webservice_v1/guide-distance.html
 */
class Distance
{
    const URL = 'http://apis.map.qq.com/ws/distance/v1/';

    private $mode = [];

    /**
     * @param array       $from
     * @param array       $to
     * @param bool        $jsonFormat
     * @param string|null $callback
     * @return mixed
     * @throws Error\TencentMapError
     * @example
     *
     * <pre>
     *
     * 多对一，或一对多，不能多对多
     *
     * $from = ["39.996059,116.353454"]
     *
     * $to = ["39.983171,116.308479", "39.949226,116.394309"]
     * <pre>
     */
    public function exec(array $from, array $to, bool $jsonFormat = true, string $callback = null)
    {
        $output = $jsonFormat ? 'json' : 'jsonp';

        $data = [
            'from' => implode(';', $from),
            'to' => implode(';', $to),
            'output' => $output,
            'callback' => $callback
        ];

        $data = array_merge($data, $this->mode);

        return TencentMap::exec(self::URL, $data);
    }

    public function setModeDriving(): void
    {
        $this->mode = ['mode' => 'driving'];
    }

    public function setModeWalking(): void
    {
        $this->mode = ['mode' => 'walking'];
    }
}