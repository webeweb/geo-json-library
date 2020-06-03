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
use WBW\Library\GeoJSON\Model\Geometry\Point;
use WBW\Library\GeoJSON\Model\Geometry\Polygon;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Polygon test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model\Geometry
 */
class PolygonTest extends AbstractTestCase {

    /**
     * Tests the addExteriorRing() method.
     *
     * @return void
     */
    public function testAddExteriorRing() {

        // Set a Point mock.
        $point = new Point();

        $obj = new Polygon();

        $obj->addExteriorRing($point);
        $this->assertSame($point, $obj->getExteriorRings()[0]);
    }

    /**
     * Tests the addInteriorRing() method.
     *
     * @return void
     */
    public function testAddInteriorRing() {

        // Set a Point mock.
        $point = new Point();

        $obj = new Polygon();

        $obj->addInteriorRing($point);
        $this->assertSame($point, $obj->getInteriorRings()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new Polygon();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_POLYGON, $obj->getType());
        $this->assertEquals([], $obj->getExteriorRings());
        $this->assertEquals([], $obj->getInteriorRings());
    }
}
