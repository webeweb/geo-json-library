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
use WBW\Library\GeoJSON\Model\Geometry\Point;
use WBW\Library\GeoJSON\Model\Position;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Point test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model\Geometry
 */
class PointTest extends AbstractTestCase {

    /**
     * Tests the setPosition() method.
     *
     * @retrun void
     */
    public function testSetPosition(): void {

        // Set a Position mock.
        $position = new Position();

        $obj = new Point();

        $obj->setPosition($position);
        $this->assertSame($position, $obj->getPosition());
    }

    /**
     * Tests the __construct() method.
     */
    public function test__construct(): void {

        $obj = new Point();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_POINT, $obj->getType());
        $this->assertNull($obj->getPosition());
    }
}
