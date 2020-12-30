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
use WBW\Library\GeoJSON\Model\Geometry\LineString;
use WBW\Library\GeoJSON\Model\Geometry\MultiLineString;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Multi line string test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model\Geometry
 */
class MultiLineStringTest extends AbstractTestCase {

    /**
     * Tests the addLineString() method.
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
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new MultiLineString();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_MULTILINESTRING, $obj->getType());
        $this->assertEquals([], $obj->getLineStrings());
    }
}
