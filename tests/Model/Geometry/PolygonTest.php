<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\GeoJson\Tests\Model\Geometry;

use JsonSerializable;
use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Model\Geometry\Polygon;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Polygon test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model\Geometry
 */
class PolygonTest extends AbstractTestCase {

    /**
     * Test addExteriorRing()
     *
     * @return void
     */
    public function testAddExteriorRing(): void {

        // Set a Point mock.
        $point = new Point();

        $obj = new Polygon();

        $obj->addExteriorRing($point);
        $this->assertSame($point, $obj->getExteriorRings()[0]);
    }

    /**
     * Test addInteriorRing()
     *
     * @return void
     */
    public function testAddInteriorRing(): void {

        // Set a Point mock.
        $point = new Point();

        $obj = new Polygon();

        $obj->addInteriorRing($point);
        $this->assertSame($point, $obj->getInteriorRings()[0]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Polygon();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJsonInterface::TYPE_POLYGON, $obj->getType());
        $this->assertEquals([], $obj->getExteriorRings());
        $this->assertEquals([], $obj->getInteriorRings());
    }
}
