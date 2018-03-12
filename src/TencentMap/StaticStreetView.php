<?php

namespace TencentMap;

/**
 * 使用参数设定场景位置及视角，系统就会返回一张静态图片
 *
 * @link http://lbs.qq.com/panostatic_v1/index.html
 */
class StaticStreetView
{
    const URL = 'http://apis.map.qq.com/ws/streetview/v1/image';

    private $select = [];

    /**
     * @param string $size    街景图片大小，宽x高，单位像素。宽度值不超过960px，高度值不超过640px
     * @param int    $heading 偏航角，与正北方向夹角，顺时针一周为360度，取值范围[0,360] 默认值：0
     * @param int    $pitch   俯仰角，街景相机抬头或低头的角度，平视时为0，低头为(0,20]，抬头为[-90,0) 默认值：0
     * @return mixed
     * @throws Error\TencentMapError
     */
    public function exec(string $size = '960*640', int $heading = 0, int $pitch = 0)
    {
        $data = [
            'size' => $size,
            'heading' => $heading,
            'pitch' => $pitch
        ];

        $data = array_merge($data, $this->select);

        return TencentMap::exec(self::URL, $data);
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->select = ['location' => $location];
    }

    /**
     * @param string $panoID
     */
    public function setPano(string $panoID): void
    {
        $this->select = ['pano' => $panoID];
    }

}