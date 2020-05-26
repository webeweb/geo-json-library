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

use WBW\Library\GeoJSON\Model\Feature;
use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Model\GeometryCollection;
use WBW\Library\GeoJSON\Model\Properties;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Feature test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class FeatureTest extends AbstractTestCase {

    /**
     * Tests the setGeometry() method.
     *
     * @return void
     */
    public function testSetGeometry() {

        // Set a Geometry mock.
        $geometry = new GeometryCollection();

        $obj = new Feature();

        $obj->setGeometry($geometry);
        $this->assertSame($geometry, $obj->getGeometry());
    }

    /**
     * Tests the setProperties() method.
     *
     * @return void
     */
    public function testSetProperties() {

        // Set a Properties mock.
        $properties = new Properties();

        $obj = new Feature();

        $obj->setProperties($properties);
        $this->assertSame($properties, $obj->getProperties());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new Feature();

        $this->assertEquals(GeoJson::TYPE_FEATURE, $obj->getType());
        $this->assertNull($obj->getGeometry());
        $this->assertNull($obj->getProperties());
    }
}
