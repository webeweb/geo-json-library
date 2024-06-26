<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\GeoJson\Tests\Serializer;

use WBW\Library\GeoJson\Model\BoundingBox;
use WBW\Library\GeoJson\Model\Feature;
use WBW\Library\GeoJson\Model\FeatureCollection;
use WBW\Library\GeoJson\Model\Geometry\LineString;
use WBW\Library\GeoJson\Model\Geometry\MultiLineString;
use WBW\Library\GeoJson\Model\Geometry\MultiPoint;
use WBW\Library\GeoJson\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Model\Geometry\Polygon;
use WBW\Library\GeoJson\Model\GeometryCollection;
use WBW\Library\GeoJson\Model\Position;
use WBW\Library\GeoJson\Model\Properties;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * JSON serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Serializer
 */
class JsonSerializerTest extends AbstractTestCase {

    /**
     * Test serializeBoundingBox()
     *
     * @return void
     */
    public function testSerializeBoundingBox(): void {

        $obj = new BoundingBox();
        $obj->addValue(0.123456789);

        $res = $obj->jsonSerialize();
        $this->assertCount(1, $res);

        $this->assertEquals([0.123456789], $res);
    }

    /**
     * Test serializeFeature()
     *
     * @return void
     */
    public function testSerializeFeature(): void {

        $obj = new Feature();

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("bbox", $res);
        $this->assertArrayHasKey("geometry", $res);
        $this->assertArrayHasKey("properties", $res);
    }

    /**
     * Test serializeFeatureCollection()
     *
     * @return void
     */
    public function testSerializeFeatureCollection(): void {

        $obj = new FeatureCollection();
        $obj->setBoundingBox(new BoundingBox());
        $obj->addFeature(new Feature());
        $obj->addForeignMember("k", "v");

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("bbox", $res);
        $this->assertArrayHasKey("features", $res);
        $this->assertArrayHasKey("k", $res);
    }

    /**
     * Test serializeGeometryCollection()
     *
     * @return void
     */
    public function testSerializeGeometryCollection(): void {

        $obj = new GeometryCollection();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("geometries", $res);
    }

    /**
     * Test serializeLineString()
     *
     * @return void
     */
    public function testSerializeLineString(): void {

        $obj = new LineString();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("coordinates", $res);
    }

    /**
     * Test serializeMultiLineString()
     *
     * @return void
     */
    public function testSerializeMultiLineString(): void {

        $obj = new MultiLineString();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("coordinates", $res);
    }

    /**
     * Test serializeMultiPoint()
     *
     * @return void
     */
    public function testSerializeMultiPoint(): void {

        $obj = new MultiPoint();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("coordinates", $res);
    }

    /**
     * Test serializeMultiPolygon()
     *
     * @return void
     */
    public function testSerializeMultiPolygon(): void {

        $obj = new MultiPolygon();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("coordinates", $res);
    }

    /**
     * Test serializePoint()
     *
     * @return void
     */
    public function testSerializePoint(): void {

        $obj = new Point();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("coordinates", $res);
    }

    /**
     * Test serializePolygon()
     *
     * @return void
     */
    public function testSerializePolygon(): void {

        $obj = new Polygon();

        $res = $obj->jsonSerialize();
        $this->assertCount(2, $res);

        $this->assertArrayHasKey("type", $res);
        $this->assertArrayHasKey("coordinates", $res);
    }

    /**
     * Test serializePosition()
     *
     * @return void
     */
    public function testSerializePosition(): void {

        $obj = new Position();

        $res = $obj->jsonSerialize();
        $this->assertCount(3, $res);

        $this->assertEquals([null, null, null], $res);
    }

    /**
     * Test serializeProperties()
     *
     * @return void
     */
    public function testSerializeProperties(): void {

        $obj = new Properties();
        $obj->addProperty("k", "v");

        $res = $obj->jsonSerialize();
        $this->assertCount(1, $res);

        $this->assertEquals(["k" => "v"], $res);
    }
}
