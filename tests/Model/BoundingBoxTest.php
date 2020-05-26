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

use WBW\Library\GeoJSON\Model\BoundingBox;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Bounding box test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class BoundingBoxTest extends AbstractTestCase {

    /**
     * Tests the addValue() method.
     *
     * @return void
     */
    public function testAddValue() {

        $obj = new BoundingBox();

        $obj->addValue(0.123456789);
        $this->assertEquals([0.123456789], $obj->getValues());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new BoundingBox();

        $this->assertEquals([], $obj->getValues());
    }
}