<?php

namespace TencentMap;

use TencentMap\Error\TencentMapError;

/**
 * 地点搜索.
 *
 * @link  http://lbs.qq.com/webservice_v1/guide-search.html
 */
class Search
{
    const BASE_URL = 'http://apis.map.qq.com/ws/';

    const URL = self::BASE_URL.'place/v1/search';

    public $boundary = null;

    /**
     * @param string      $keyword
     * @param string      $filter
     * @param string      $orderBy
     * @param int         $page_size  每页条目数，最大限制为20条
     * @param int         $page_index 第x页，默认第1页
     * @param bool        $jsonFormat
     * @param string|null $callback   JSONP 方式回调函数
     *
     * @throws TencentMapError
     *
     * @return mixed
     *
     * @example
     *                                <pre>
     *                                keyword = '酒店';
     *
     *  boundary=region(北京,0)
     *
     *  boundary=nearby(39.908491,116.374328,1000)
     *
     *  boundary=rectangle(39.9072,116.3689,39.9149,116.3793)
     *
     *  filter=category=公交站
     *
     *  filter=category=大学,中学
     *
     *  filter=category<>商务楼宇
     *
     *  orderby=_distance desc
     *
     *  orderby=_distance
     * <pre>
     */
    public function exec(string $keyword,
                         string $filter = null,
                         string $orderBy = null,
                         int $page_size = null,
                         int $page_index = null,
                         bool $jsonFormat = true,
                         string $callback = null)
    {
        if (!$this->boundary) {
            throw new TencentMapError(null, 310);
        }

        $jsonFormat = $jsonFormat ? 'JSON' : 'JSONP';

        $url = self::URL;

        $data = [
            'keyword' => $keyword,
            'boundary' => $this->boundary,
            'filter' => $filter,
            'orderby' => $orderBy,
            'page_size' => $page_size,
            'page_index' => $page_index,
            'output' => $jsonFormat,
            'callback' => $callback,
        ];

        $data = array_filter($data);

        return TencentMap::exec($url, $data);
    }

    /**
     * 搜索地理范围 -> 指定地区名称.
     *
     * @param string     $city
     * @param bool       $autoExtend 若当前城市搜索无结果，则自动扩大范围或仅在当前城市搜索
     * @param float|null $lat
     * @param float|null $lng
     */
    public function setBoundaryRegion(string $city, bool $autoExtend = false, float $lat = null, float $lng = null): void
    {
        $autoExtend = (int) $autoExtend;
        $this->boundary = "region($city,$autoExtend)";
        if ($lat && $lng) {
            $this->boundary = "region($city,$autoExtend,$lat,$lng)";
        }
    }

    /**
     * 搜索地理范围 -> 周边搜索.
     *
     * @param float $lat
     * @param float $lng    经度纬度确定一点
     * @param int   $radius 半径
     */
    public function setBoundaryNearby(float $lat, float $lng, int $radius)
    {
        $this->boundary = "nearby($lat,$lng,$radius)";
    }

    /**
     * 搜索地理范围 -> 矩形搜索.
     *
     * @param float $lat        左下经度
     * @param float $lng        左下纬度
     * @param float $rightUpLat 右上经度
     * @param float $rightUpLng 右上纬度
     */
    public function setBoundaryRectangle(float $lat, float $lng, float $rightUpLat, float $rightUpLng)
    {
        $this->boundary = "rectangle($lat,$lng,$rightUpLat,$rightUpLng)";
    }

    public function setFilter()
    {
    }
}
