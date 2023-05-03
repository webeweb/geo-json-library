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
use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Model\Geometry\LineString;
use WBW\Library\GeoJson\Model\Geometry\MultiLineString;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Multi line string test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model\Geometry
 */
class MultiLineStringTest extends AbstractTestCase {

    /**
     * Test addLineString()
     *
     * @return void
     */
    public function testAddPoint(): void {

        // Set a Line string mock.
        $lineString = new LineString();

        $obj = new MultiLineString();

        $obj->addLineString($lineString);
        $this->assertSame($lineString, $obj->getLineStrings()[0]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new MultiLineString();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJsonInterface::TYPE_MULTI_LINE_STRING, $obj->getType());
        $this->assertEquals([], $obj->getLineStrings());
    }
}
