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

use WBW\Library\GeoJSON\Tests\AbstractTestCase;
use WBW\Library\GeoJSON\Tests\Fixtures\Model\TestGeometry;

/**
 * Geometry test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class GeometryTest extends AbstractTestCase {

    /**
     * Tests the addGeometry() method.
     *
     * @return void
     */
    public function testAddGeometry() {

        // Set a Geometry mock.
        $geometry = new TestGeometry();

        $obj = new TestGeometry();

        $obj->addGeometry($geometry);
        $this->assertSame($geometry, $obj->getGeometries()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestGeometry();

        $this->assertEquals([], $obj->getGeometries());
    }
}
