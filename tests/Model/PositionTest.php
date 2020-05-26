<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Model;

use JsonSerializable;
use WBW\Library\GeoJSON\Model\Position;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Position test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class PositionTest extends AbstractTestCase {

    /**
     * Tests the setAltitude() method.
     *
     * @return void
     */
    public function testSetAltitude() {

        $obj = new Position();

        $obj->setAltitude(0.123456789);
        $this->assertEquals(0.123456789, $obj->getAltitude());
    }

    /**
     * Tests the setLatitude() method.
     *
     * @return void
     */
    public function testSetLatitude() {

        $obj = new Position();

        $obj->setLatitude(0.123456789);
        $this->assertEquals(0.123456789, $obj->getLatitude());
    }

    /**
     * Tests the setLongitude() method.
     *
     * @return void
     */
    public function testSetLongitude() {

        $obj = new Position();

        $obj->setLongitude(0.123456789);
        $this->assertEquals(0.123456789, $obj->getLongitude());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new Position();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertNull($obj->getLongitude());
        $this->assertNull($obj->getLatitude());
        $this->assertNull($obj->getAltitude());
    }
}