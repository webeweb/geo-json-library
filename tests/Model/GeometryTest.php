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
use WBW\Library\GeoJSON\Model\Position;

/**
 * Geometry test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class GeometryTest extends AbstractTestCase {

    /**
     * Tests the addCoordinate() method.
     *
     * @return void
     */
    public function testAddCoordinate() {

        // Set a Coordinate mock.
        $coordinate = new Position();

        $obj = new TestGeometry();

        $obj->addCoordinate($coordinate);
        $this->assertSame($coordinate, $obj->getCoordinates()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestGeometry();

        $this->assertEquals([], $obj->getCoordinates());
    }
}
