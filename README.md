# Tencent Map SDK

[![GitHub stars](https://img.shields.io/github/stars/khs1994-php/tencent-map.svg?style=social&label=Stars)](https://github.com/khs1994-php/tencent-map) [![PHP from Packagist](https://img.shields.io/packagist/php-v/khs1994/tencent-map.svg)](https://packagist.org/packages/khs1994/tencent-map) [![GitHub (pre-)release](https://img.shields.io/github/release/khs1994-php/tencent-map/all.svg)](https://github.com/khs1994-php/tencent-map/releases) [![Build Status](https://travis-ci.org/khs1994-php/tencent-map.svg?branch=master)](https://travis-ci.org/khs1994-php/tencent-map) [![StyleCI](https://styleci.io/repos/115306597/shield?branch=master)](https://styleci.io/repos/115306597)

* [官方文档](http://lbs.qq.com/webservice_v1/index.html)

## Installation

To Use Tencent Map SDK, simply:

```bash
$ composer require khs1994/tencent-map
```

For latest commit version:

```bash
$ composer require khs1994/tencent-map @dev
```

## Usage

```php
<?php

require __DIR__.'/vendor/autoload.php';

use TencentMap\{
    Error\TencentMapError,
    TencentMap
};

const APP_KEY = 'GTOBZ-63LW6-7N6SX-MRRVB-LECGJ-XXXXX';

$map = TencentMap::tencentMap(APP_KEY);

// must try-catch

try {
    $search = $map->search();
    $search->setBoundaryRegion('北京');
    $output = $search->exec('酒店');
} catch (TencentMapError $e) {
    die($e->getMessage());
}

var_dump($output);
```

## PHP CaaS

**Powered By [khs1994-docker/lnmp](https://github.com/khs1994-docker/lnmp)**

## CI/CD

* [Drone](https://www.khs1994.com/categories/CI/Drone/)

* [Travis CI](https://travis-ci.org/khs1994-php/tencent-map)

* [Style CI](https://styleci.io/repos/115306597)

* [Aliyun CodePipeline](https://www.aliyun.com/product/codepipeline)

* [Tencent Cloud Continuous Integration](https://cloud.tencent.com/product/cci)

* [Docker Build Powered By Tencent Cloud Container Service](https://cloud.tencent.com/product/ccs)

* [Docker Build Powered By Docker Cloud](https://cloud.docker.com)

* [Docker Build Powered By Aliyun Container Service](https://www.aliyun.com/product/containerservice)
