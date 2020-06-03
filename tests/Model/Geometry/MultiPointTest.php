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

use JsonSerializable;
use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Model\Geometry\MultiPoint;
use WBW\Library\GeoJSON\Model\Geometry\Point;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Multi point test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model\Geometry
 */
class MultiPointTest extends AbstractTestCase {

    /**
     * Tests the addPoint() method.
     *
     * @return void
     */
    public function testAddPoint() {

        // Set a Point mock.
        $point = new Point();

        $obj = new MultiPoint();

        $obj->addPoint($point);
        $this->assertSame($point, $obj->getPoints()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new MultiPoint();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_MULTIPOINT, $obj->getType());
        $this->assertEquals([], $obj->getPoints());
    }
}
