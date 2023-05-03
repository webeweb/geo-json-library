<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Model;

use JsonSerializable;
use WBW\Library\GeoJson\Model\Position;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Position test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class PositionTest extends AbstractTestCase {

    /**
     * Test setAltitude()
     *
     * @return void
     */
    public function testSetAltitude(): void {

        $obj = new Position();

        $obj->setAltitude(0.123456789);
        $this->assertEquals(0.123456789, $obj->getAltitude());
    }

    /**
     * Test setLatitude()
     *
     * @return void
     */
    public function testSetLatitude(): void {

        $obj = new Position();

        $obj->setLatitude(0.123456789);
        $this->assertEquals(0.123456789, $obj->getLatitude());
    }

    /**
     * Test setLongitude()
     *
     * @return void
     */
    public function testSetLongitude(): void {

        $obj = new Position();

        $obj->setLongitude(0.123456789);
        $this->assertEquals(0.123456789, $obj->getLongitude());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Position();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertNull($obj->getLongitude());
        $this->assertNull($obj->getLatitude());
        $this->assertNull($obj->getAltitude());
    }
}
