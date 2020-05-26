<?php

/*
 * This file is part of the opendata-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Model;

use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Model\GeometryCollection;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Geometry collection test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class GeometryCollectionTest extends AbstractTestCase {

    /**
     * Tests the addGeometry() method.
     *
     * @return void
     */
    public function testAddGeometry() {

        // Set a Geometry mock.
        $geometry = new GeometryCollection();

        $obj = new GeometryCollection();

        $obj->addGeometry($geometry);
        $this->assertSame($geometry, $obj->getGeometries()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new GeometryCollection();

        $this->assertEquals(GeoJson::TYPE_GEOMETRYCOLLECTION, $obj->getType());
        $this->assertEquals([], $obj->getGeometries());
    }
}
