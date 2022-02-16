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
use WBW\Library\GeoJson\Tests\AbstractTestCase;
use WBW\Library\GeoJson\Tests\Fixtures\Model\TestGeometry;

/**
 * Geometry test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class GeometryTest extends AbstractTestCase {

    /**
     * Tests addGeometry()
     *
     * @return void
     */
    public function testAddGeometry(): void {

        // Set a Geometry mock.
        $geometry = new TestGeometry();

        $obj = new TestGeometry();

        $obj->addGeometry($geometry);
        $this->assertSame($geometry, $obj->getGeometries()[0]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestGeometry();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals([], $obj->getGeometries());
    }
}
