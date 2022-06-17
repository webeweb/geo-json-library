<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Model\Geometry;

use JsonSerializable;
use PHPUnit\Framework\TestCase;
use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJson\Model\Geometry\Polygon;

/**
 * Multi polygon test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model\Geometry
 */
class MultiPolygonTest extends TestCase {

    /**
     * Tests addPolygon()
     *
     * @return void
     */
    public function testAddPolygon(): void {

        // Set a Polygon mock.
        $point = new Polygon();

        $obj = new MultiPolygon();

        $obj->addPolygon($point);
        $this->assertSame($point, $obj->getPolygons()[0]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new MultiPolygon();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJsonInterface::TYPE_MULTIPOLYGON, $obj->getType());
        $this->assertEquals([], $obj->getPolygons());
    }
}
