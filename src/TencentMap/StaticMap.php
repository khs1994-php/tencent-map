<?php

namespace TencentMap;

/**
 * 使用参数设定地图位置、缩放级别、叠加标注和路线等，系统就会返回一张静态地图图片
 *
 * @link http://lbs.qq.com/static_v2/index.html
 */
class StaticMap
{
    const URL = 'http://apis.map.qq.com/ws/staticmap/v2/';

    private $format = ['format' => 'png'];

    public function setFormatPNG(): void
    {
        $this->format = ['format' => 'png'];
    }

    public function setFormatPNG8(): void
    {
        $this->format = ['format' => 'png8'];
    }

    public function setFormatGIF(): void
    {
        $this->format = ['format' => 'gif'];
    }

    public function setFormatJPG(): void
    {
        $this->format = ['format' => 'jpg'];
    }

    /**
     * @param string $center  地图视图中心点，为经纬度坐标。若用户指定了markers、labels、path中至少一项，则此项可不填。
     * @param string $size    地图静态图片大小，宽*高，单位像素
     * @param int    $zoom    地图视图的级别设置 3<=zoom<=18  18级仅在maptype=roadmap时支持
     * @param bool   $scale   是否高清，取值2为高清，取值1为普清
     * @param string $mapType 普通路网，roadmap 卫星，satellite 地形图，landform 地形叠加路网，terrain 卫星叠加路网，hybrid
     * @param string $markers
     * @param string $labels
     * @param string $path
     * @return mixed
     * @throws Error\TencentMapError
     */
    public function exec(string $center,
                         string $size = '960*540',
                         int $zoom = 10,
                         bool $scale = true,
                         string $mapType = null,
                         string $markers = null,
                         string $labels = null,
                         string $path = null
    )
    {
        $scale = $scale ? 2 : 1;

        $data = [
            'size' => $size,
            'center' => $center,
            'zoom' => $zoom,
            'scale' => $scale,
            'maptype' => $mapType,
            'markers' => $markers,
            'labels' => $labels,
            'path' => $path,

        ];

        $data = array_merge($data, $this->format);

        return TencentMap::exec(self::URL, $data);
    }

}