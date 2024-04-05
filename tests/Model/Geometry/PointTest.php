<?php

declare(strict_types = 1);

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
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Model\Position;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Point test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model\Geometry
 */
class PointTest extends AbstractTestCase {

    /**
     * Test setPosition()
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
     * Test __construct()
     */
    public function test__construct(): void {

        $obj = new Point();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJsonInterface::TYPE_POINT, $obj->getType());
        $this->assertNull($obj->getPosition());
    }
}
