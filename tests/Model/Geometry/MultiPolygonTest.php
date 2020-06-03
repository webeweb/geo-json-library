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
use PHPUnit\Framework\TestCase;
use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJSON\Model\Geometry\Polygon;

/**
 * Multi polygon test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model\Geometry
 */
class MultiPolygonTest extends TestCase {

    /**
     * Tests the addPolygon() method.
     *
     * @return void
     */
    public function testAddPolygon() {

        // Set a Polygon mock.
        $point = new Polygon();

        $obj = new MultiPolygon();

        $obj->addPolygon($point);
        $this->assertSame($point, $obj->getPolygons()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new MultiPolygon();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_MULTIPOLYGON, $obj->getType());
        $this->assertEquals([], $obj->getPolygons());
    }
}
