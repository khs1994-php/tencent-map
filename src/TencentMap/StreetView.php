<?php

namespace TencentMap;

use TencentMap\Error\TencentMapError;

/**
 * 根据指定坐标及半径，查询该坐标所在位置附近的最近场景点，返回场景点ID等信息
 *
 * @link http://lbs.qq.com/webservice_v1/guide-adsorb.html
 */
class StreetView
{
    const URL = 'http://apis.map.qq.com/ws/streetview/v1/getpano';

    private $select = [];

    /**
     * @param int    $radius 计算半径，取该坐标指定半径范围内的全景点ID。最大值：200，单位：米
     * @param bool   $jsonFormat
     * @param string $callback
     * @return mixed
     * @throws TencentMapError
     */
    public function exec(int $radius = 200, bool $jsonFormat = true, string $callback = null)
    {
        if (!($this->select)) {
            throw new TencentMapError(null, 310);
        }

        $output = $jsonFormat ? "json" : "jsonp";

        $data = [
            'radius' => $radius,
            'output' => $output,
            'callback' => $callback
        ];

        $data = array_merge($data, $this->select);

        return TencentMap::exec(self::URL, $data);
    }

    /**
     * @param string $id
     */
    public function setID(string $id)
    {
        $this->select = ['id' => $id];
    }

    /**
     * @param float $lat
     * @param float $lng
     */
    public function setLocation(float $lat, float $lng)
    {
        $this->select = ['location' => "$lat,$lng"];
    }

    /**
     * @param string $poiId
     */
    public function setPoi(string $poiId)
    {
        $this->select = ['poi' => $poiId];
    }

}