<?php

namespace TencentMap;

use Curl\Curl;
use Curl\Error\CurlError;
use TencentMap\Error\TencentMapError;

/**
 *
 * @method  AddressToLocation   addressToLocation()
 * @method  Distance            distance()
 * @method  District            district()
 * @method  IP                  ip()
 * @method  KeyWord             keyWord()
 * @method  LocationToAddress   locationToAddress()
 * @method  Search              search()
 * @method  StaticMap           staticMap()
 * @method  StaticStreetView    staticStreetView()
 * @method  StreetView          streetView()
 * @method  Translate           translate()
 *
 * @link http://lbs.qq.com/webservice_v1/index.html
 */
class TencentMap
{
    private const VERSION = '18.03';

    private static $appKey;

    private static $curl;

    private static $tencentMap;

    /**
     * TencentMap constructor.
     * @param string $appKey
     */
    private function __construct(string $appKey)
    {
        self::$appKey = $appKey;
        self::$curl = new Curl();
    }

    private function __clone()
    {
        /**
         *  Private clone
         */
    }

    /**
     * @param string $appKey
     * @return TencentMap
     */
    public static function tencentMap(string $appKey)
    {
        if (!(self::$tencentMap instanceof self)) {
            self::$tencentMap = new self($appKey);
        }

        return self::$tencentMap;
    }

    /**
     * @param string $url
     * @param array  $data
     * @return mixed
     * @throws TencentMapError
     */
    public static function exec(string $url, array $data)
    {
        $data = array_filter(array_merge($data, [
                'key' => self::$appKey,
            ]
        ));

        $data = http_build_query($data);

        $url = $url.'?'.$data;

        try {
            $output = self::$curl->get($url);
        } catch (CurlError $e) {
            throw new TencentMapError($e->getMessage(), $e->getCode());
        }

        return $output;
    }

    /**
     * 由魔术方法分流
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        switch ($name) {
            case "ip":
                return new IP();
                break;
        }
        $obj = __NAMESPACE__.'\\'.ucfirst($name);

        return new $obj();
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }
}
