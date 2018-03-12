<?php

namespace TencentMap;

/**
 * 提供中国标准行政区划数据，可用于生成城市列表控件等功能时使用.
 *
 * @link http://lbs.qq.com/webservice_v1/guide-region.html
 */
class District
{
    const URL = 'http://apis.map.qq.com/ws/district/v1/list';

    const CHILDREN_URL = 'http://apis.map.qq.com/ws/district/v1/getchildren';

    const SEARCH_URL = 'http://apis.map.qq.com/ws/district/v1/search';

    private $format = true;

    private $callback = null;

    private $data = [];

    /**
     * @param string url
     *
     * @throws Error\TencentMapError
     *
     * @return mixed
     */
    private function exec(string $url)
    {
        $output = $this->format ? 'json' : 'jsonp';
        $data = [
            'output' => $output,
            'callback' => $this->callback,
        ];

        $data = array_merge($data, $this->data);

        return TencentMap::exec($url, $data);
    }

    /**
     * @throws Error\TencentMapError
     *
     * @return mixed
     */
    public function list()
    {
        return $this->exec(self::URL);
    }

    /**
     * @param int $id
     *
     * @throws Error\TencentMapError
     *
     * @return mixed
     */
    public function getChildren(int $id)
    {
        $this->data = ['id' => $id];

        return $this->exec(self::CHILDREN_URL);
    }

    /**
     * @param string $keyWord
     *
     * @throws Error\TencentMapError
     *
     * @return mixed
     */
    public function search(string $keyWord)
    {
        $this->data = ['keyword' => $keyWord];

        return $this->exec(self::SEARCH_URL);
    }

    /**
     * @param bool        $jsonFormat
     * @param string|null $callback
     */
    public function setFormat(bool $jsonFormat, string $callback = null)
    {
        $this->format = $jsonFormat;
        $this->callback = $callback;
    }
}
