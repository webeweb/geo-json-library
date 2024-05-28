<?php

/*
 * This file is part of the opendata-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\GeoJson\Tests\Model;

use JsonSerializable;
use WBW\Library\GeoJson\Model\Feature;
use WBW\Library\GeoJson\Model\FeatureCollection;
use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Feature collection test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class FeatureCollectionTest extends AbstractTestCase {

    /**
     * Test addFeature()
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
     * Test addForeignMember()
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
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new FeatureCollection();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJsonInterface::TYPE_FEATURE_COLLECTION, $obj->getType());
        $this->assertNull($obj->getBoundingBox());
        $this->assertEquals([], $obj->getFeatures());
        $this->assertEquals([], $obj->getForeignMembers());
    }
}
