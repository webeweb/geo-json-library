<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Serializer;

use WBW\Library\GeoJSON\Model\BoundingBox;
use WBW\Library\GeoJSON\Model\Feature;
use WBW\Library\GeoJSON\Model\FeatureCollection;
use WBW\Library\GeoJSON\Model\Geometry\LineString;
use WBW\Library\GeoJSON\Model\Geometry\MultiLineString;
use WBW\Library\GeoJSON\Model\Geometry\MultiPoint;
use WBW\Library\GeoJSON\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJSON\Model\Geometry\Point;
use WBW\Library\GeoJSON\Model\Geometry\Polygon;
use WBW\Library\GeoJSON\Model\GeometryCollection;
use WBW\Library\GeoJSON\Model\Position;
use WBW\Library\GeoJSON\Model\Properties;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * JSON serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Serializer
 */
class JsonSerializerTest extends AbstractTestCase {

    /**
     * Tests the serializeBoundingBox() method.
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
     * Tests the serializeFeature() method.
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
     * Tests the serializeFeatureCollection() method.
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
     * Tests the serializeGeometryCollection() method.
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
     * Tests the serializeLineString() method.
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
     * Tests the serializeMultiLineString() method.
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
     * Tests the serializeMultiPoint() method.
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
     * Tests the serializeMultiPolygon() method.
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
     * Tests the serializePoint() method.
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
     * Tests the serializePolygon() method.
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
     * Tests the serializePosition() method.
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
     * Tests the serializeProperties() method.
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