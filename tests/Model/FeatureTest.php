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
use WBW\Library\GeoJson\Model\Feature;
use WBW\Library\GeoJson\Model\GeoJson;
use WBW\Library\GeoJson\Model\GeometryCollection;
use WBW\Library\GeoJson\Model\Properties;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Feature test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class FeatureTest extends AbstractTestCase {

    /**
     * Tests setGeometry()
     *
     * @return void
     */
    public function testSetGeometry(): void {

        // Set a Geometry mock.
        $geometry = new GeometryCollection();

        $obj = new Feature();

        $obj->setGeometry($geometry);
        $this->assertSame($geometry, $obj->getGeometry());
    }

    /**
     * Tests setProperties()
     *
     * @return void
     */
    public function testSetProperties(): void {

        // Set a Properties mock.
        $properties = new Properties();

        $obj = new Feature();

        $obj->setProperties($properties);
        $this->assertSame($properties, $obj->getProperties());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Feature();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_FEATURE, $obj->getType());
        $this->assertNull($obj->getBoundingBox());
        $this->assertNull($obj->getGeometry());
        $this->assertNull($obj->getProperties());
    }
}
