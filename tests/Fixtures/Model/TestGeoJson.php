<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Fixtures\Model;

use WBW\Library\GeoJSON\Model\GeoJson;

/**
 * Test Geo JSON.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Fixtures\Model
 */
class TestGeoJson extends GeoJson {

    /**
     * Constructor.
     *
     * @param $type
     */
    public function __construct($type) {
        parent::__construct($type);
    }
}