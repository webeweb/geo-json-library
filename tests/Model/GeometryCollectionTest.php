<?php

/*
 * This file is part of the opendata-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Model;

use JsonSerializable;
use WBW\Library\GeoJson\Model\GeoJson;
use WBW\Library\GeoJson\Model\GeometryCollection;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Geometry collection test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class GeometryCollectionTest extends AbstractTestCase {

    /**
     * Tests addGeometry()
     *
     * @return void
     */
    public function testAddGeometry(): void {

        // Set a Geometry mock.
        $geometry = new GeometryCollection();

        $obj = new GeometryCollection();

        $obj->addGeometry($geometry);
        $this->assertSame($geometry, $obj->getGeometries()[0]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new GeometryCollection();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_GEOMETRYCOLLECTION, $obj->getType());
        $this->assertEquals([], $obj->getGeometries());
    }
}
