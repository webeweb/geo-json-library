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

namespace WBW\Library\GeoJson\Tests\Model;

use JsonSerializable;
use WBW\Library\GeoJson\Model\Properties;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Properties test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class PropertiesTest extends AbstractTestCase {

    /**
     * Test addProperty()
     *
     * @return void
     */
    public function testAddProperty(): void {

        $obj = new Properties();

        $obj->addProperty("k", "v");
        $this->assertEquals(["k" => "v"], $obj->getProperties());

        $this->assertEquals("v", $obj->getProperty("k"));
        $this->assertNull($obj->getProperty("exception"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Properties();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals([], $obj->getProperties());
    }
}
