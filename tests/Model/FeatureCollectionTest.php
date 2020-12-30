<?php

/*
 * This file is part of the opendata-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Model;

use JsonSerializable;
use WBW\Library\GeoJSON\Model\Feature;
use WBW\Library\GeoJSON\Model\FeatureCollection;
use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Feature collection test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class FeatureCollectionTest extends AbstractTestCase {

    /**
     * Tests the addFeature() method.
     *
     * @return void
     */
    public function testAddFeature(): void {

        // Set a Feature mock.
        $feature = new Feature();

        $obj = new FeatureCollection();

        $obj->addFeature($feature);
        $this->assertSame($feature, $obj->getFeatures()[0]);
    }

    /**
     * Tests the addForeignMember() method.
     *
     * @return void
     */
    public function testAddForeignMember(): void {

        $obj = new FeatureCollection();

        $obj->addForeignMember("k", "v");
        $this->assertEquals(["k" => "v"], $obj->getForeignMembers());

        $this->assertEquals("v", $obj->getForeignMember("k"));
        $this->assertNull($obj->getForeignMember("exception"));
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new FeatureCollection();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJson::TYPE_FEATURECOLLECTION, $obj->getType());
        $this->assertNull($obj->getBoundingBox());
        $this->assertEquals([], $obj->getFeatures());
        $this->assertEquals([], $obj->getForeignMembers());
    }
}
