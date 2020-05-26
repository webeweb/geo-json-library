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

use WBW\Library\GeoJSON\Model\Properties;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Properties test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class PropertiesTest extends AbstractTestCase {

    /**
     * Tests the addProperty() method.
     *
     * @return void
     */
    public function testAddProperty() {

        $obj = new Properties();

        $obj->addProperty("k", "v");
        $this->assertEquals(["k" => "v"], $obj->getProperties());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new Properties();

        $this->assertEquals([], $obj->getProperties());
    }
}