<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Model\Geometry;

use WBW\Library\GeoJSON\Tests\AbstractTestCase;
use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Model\Geometry\MultiPoint;

/**
 * Multi point test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model\Geometry
 */
class MultiPointTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new MultiPoint();

        $this->assertEquals(GeoJson::TYPE_MULTIPOINT, $obj->getType());
    }
}
