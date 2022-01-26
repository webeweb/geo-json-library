<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Serializer;

use WBW\Library\GeoJson\Model\BoundingBox;
use WBW\Library\GeoJson\Model\Feature;
use WBW\Library\GeoJson\Model\FeatureCollection;
use WBW\Library\GeoJson\Model\Geometry;
use WBW\Library\GeoJson\Model\Geometry\LineString;
use WBW\Library\GeoJson\Model\Geometry\MultiLineString;
use WBW\Library\GeoJson\Model\Geometry\MultiPoint;
use WBW\Library\GeoJson\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Model\Geometry\Polygon;
use WBW\Library\GeoJson\Model\GeometryCollection;
use WBW\Library\GeoJson\Tests\AbstractTestCase;
use WBW\Library\GeoJson\Tests\Fixtures\Serializer\TestJsonDeserializer;

/**
 * JSON deserializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Serializer
 */
class JsonDeserializerTest extends AbstractTestCase {

    /**
     * Tests the deserializeBoundingBox() method.
     *
     * @rteurn void
     */
    public function testDeserializeBoundingBox(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeBoundingBox.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeBoundingBox($data["bbox"]);
        $this->assertInstanceOf(BoundingBox::class, $res);

        $this->assertEquals(-10.0, $res->getValues()[0]);
        $this->assertEquals(-10.0, $res->getValues()[1]);
        $this->assertEquals(10.0, $res->getValues()[2]);
        $this->assertEquals(10.0, $res->getValues()[3]);
    }

    /**
     * Tests the deserializeFeature() method.
     *
     * @rteurn void
     */
    public function testDeserializeFeature(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeFeature.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeFeature($data);
        $this->assertInstanceOf(Feature::class, $res);

        $this->assertInstanceOf(Geometry::class, $res->getGeometry());
        $this->assertNull($res->getProperties());
    }

    /**
     * Tests the deserializeFeatureCollection() method.
     *
     * @rteurn void
     */
    public function testDeserializeFeatureCollection(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeFeatureCollection.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeFeatureCollection($data);
        $this->assertInstanceOf(FeatureCollection::class, $res);

        $this->assertCount(3, $res->getFeatures());

        $this->assertInstanceOf(Point::class, $res->getFeatures()[0]->getGeometry());
        $this->assertInstanceOf(LineString::class, $res->getFeatures()[1]->getGeometry());
        $this->assertInstanceOf(Polygon::class, $res->getFeatures()[2]->getGeometry());
    }

    /**
     * Tests the deserializeFeatureCollection() method.
     *
     * @rteurn void
     */
    public function testDeserializeFeatureCollectionWithMalformedData(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeFeatureCollectionWithMalformedData.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeFeatureCollection($data);
        $this->assertInstanceOf(FeatureCollection::class, $res);

        $this->assertCount(7, $res->getFeatures());

        $this->assertNull($res->getFeatures()[0]->getGeometry());
        $this->assertNull($res->getFeatures()[1]->getGeometry());
        $this->assertNull($res->getFeatures()[2]->getGeometry());
        $this->assertNull($res->getFeatures()[3]->getGeometry());
        $this->assertNull($res->getFeatures()[4]->getGeometry());
        $this->assertNull($res->getFeatures()[5]->getGeometry());
        $this->assertNull($res->getFeatures()[6]->getGeometry());
    }

    /**
     * Tests the deserializeGeometry() method.
     *
     * @rteurn void
     */
    public function testDeserializeGeometry(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeLineString.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeGeometry($data);
        $this->assertInstanceOf(LineString::class, $res);
    }

    /**
     * Tests the deserializeGeometryCollection() method.
     *
     * @return void
     */
    public function testDeserializeGeometryCollection(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeGeometryCollection.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeGeometryCollection($data["geometries"]);
        $this->assertInstanceOf(GeometryCollection::class, $res);

        $this->assertInstanceOf(LineString::class, $res->getGeometries()[0]);
        $this->assertInstanceOf(MultiLineString::class, $res->getGeometries()[1]);
        $this->assertInstanceOf(MultiPoint::class, $res->getGeometries()[2]);
        $this->assertInstanceOf(MultiPolygon::class, $res->getGeometries()[3]);
        $this->assertInstanceOf(Point::class, $res->getGeometries()[4]);
        $this->assertInstanceOf(Polygon::class, $res->getGeometries()[5]);
    }

    /**
     * Tests the deserializeLineString() method.
     *
     * @return void
     */
    public function testDeserializeLineString(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeLineString.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeLineString($data["coordinates"]);
        $this->assertInstanceOf(LineString::class, $res);

        $this->assertEquals(100.0, $res->getPoints()[0]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getPoints()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getPoints()[0]->getPosition()->getAltitude());

        $this->assertEquals(101.0, $res->getPoints()[1]->getPosition()->getLongitude());
        $this->assertEquals(1.0, $res->getPoints()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getPoints()[1]->getPosition()->getAltitude());
    }

    /**
     * Tests the deserializeMultiLineString() method.
     *
     * @return void
     */
    public function testDeserializeMultiLineString(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeMultiLineString.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeMultiLineString($data["coordinates"]);
        $this->assertInstanceOf(MultiLineString::class, $res);

        $this->assertEquals(100.0, $res->getLineStrings()[0]->getPoints()[0]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getLineStrings()[0]->getPoints()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getLineStrings()[0]->getPoints()[0]->getPosition()->getAltitude());

        $this->assertEquals(101.0, $res->getLineStrings()[0]->getPoints()[1]->getPosition()->getLongitude());
        $this->assertEquals(1.0, $res->getLineStrings()[0]->getPoints()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getLineStrings()[0]->getPoints()[1]->getPosition()->getAltitude());

        $this->assertEquals(102.0, $res->getLineStrings()[1]->getPoints()[0]->getPosition()->getLongitude());
        $this->assertEquals(2.0, $res->getLineStrings()[1]->getPoints()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getLineStrings()[1]->getPoints()[0]->getPosition()->getAltitude());

        $this->assertEquals(103.0, $res->getLineStrings()[1]->getPoints()[1]->getPosition()->getLongitude());
        $this->assertEquals(3.0, $res->getLineStrings()[1]->getPoints()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getLineStrings()[1]->getPoints()[1]->getPosition()->getAltitude());
    }

    /**
     * Tests the deserializeMultiPoint() method.
     *
     * @return void
     */
    public function testDeserializeMultiPoint(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeMultiPoint.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeMultiPoint($data["coordinates"]);
        $this->assertInstanceOf(MultiPoint::class, $res);

        $this->assertEquals(100.0, $res->getPoints()[0]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getPoints()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getPoints()[0]->getPosition()->getAltitude());

        $this->assertEquals(101.0, $res->getPoints()[1]->getPosition()->getLongitude());
        $this->assertEquals(1.0, $res->getPoints()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getPoints()[1]->getPosition()->getAltitude());
    }

    /**
     * Tests the deserializeMultiPolygon() method.
     *
     * @return void
     */
    public function testDeserializeMultiPolygon(): void {

        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeMultiPolygon.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializeMultiPolygon($data["coordinates"]);
        $this->assertInstanceOf(MultiPolygon::class, $res);

        $this->assertEquals(102.0, $res->getPolygons()[0]->getExteriorRings()[0]->getPosition()->getLongitude());
        $this->assertEquals(2.0, $res->getPolygons()[0]->getExteriorRings()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[0]->getExteriorRings()[0]->getPosition()->getAltitude());

        $this->assertEquals(103.0, $res->getPolygons()[0]->getExteriorRings()[1]->getPosition()->getLongitude());
        $this->assertEquals(2.0, $res->getPolygons()[0]->getExteriorRings()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[0]->getExteriorRings()[1]->getPosition()->getAltitude());

        $this->assertEquals(103.0, $res->getPolygons()[0]->getExteriorRings()[2]->getPosition()->getLongitude());
        $this->assertEquals(3.0, $res->getPolygons()[0]->getExteriorRings()[2]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[0]->getExteriorRings()[2]->getPosition()->getAltitude());

        $this->assertEquals(102.0, $res->getPolygons()[0]->getExteriorRings()[3]->getPosition()->getLongitude());
        $this->assertEquals(3.0, $res->getPolygons()[0]->getExteriorRings()[3]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[0]->getExteriorRings()[3]->getPosition()->getAltitude());

        $this->assertEquals(102.0, $res->getPolygons()[0]->getExteriorRings()[4]->getPosition()->getLongitude());
        $this->assertEquals(2.0, $res->getPolygons()[0]->getExteriorRings()[4]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[0]->getExteriorRings()[4]->getPosition()->getAltitude());

        $this->assertEquals(100.0, $res->getPolygons()[1]->getExteriorRings()[0]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getPolygons()[1]->getExteriorRings()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getExteriorRings()[0]->getPosition()->getAltitude());

        $this->assertEquals(101.0, $res->getPolygons()[1]->getExteriorRings()[1]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getPolygons()[1]->getExteriorRings()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getExteriorRings()[1]->getPosition()->getAltitude());

        $this->assertEquals(101.0, $res->getPolygons()[1]->getExteriorRings()[2]->getPosition()->getLongitude());
        $this->assertEquals(1.0, $res->getPolygons()[1]->getExteriorRings()[2]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getExteriorRings()[2]->getPosition()->getAltitude());

        $this->assertEquals(100.0, $res->getPolygons()[1]->getExteriorRings()[3]->getPosition()->getLongitude());
        $this->assertEquals(1.0, $res->getPolygons()[1]->getExteriorRings()[3]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getExteriorRings()[3]->getPosition()->getAltitude());

        $this->assertEquals(100.0, $res->getPolygons()[1]->getExteriorRings()[4]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getPolygons()[1]->getExteriorRings()[4]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getExteriorRings()[4]->getPosition()->getAltitude());

        $this->assertEquals(100.2, $res->getPolygons()[1]->getInteriorRings()[0]->getPosition()->getLongitude());
        $this->assertEquals(0.2, $res->getPolygons()[1]->getInteriorRings()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getInteriorRings()[0]->getPosition()->getAltitude());

        $this->assertEquals(100.2, $res->getPolygons()[1]->getInteriorRings()[1]->getPosition()->getLongitude());
        $this->assertEquals(0.8, $res->getPolygons()[1]->getInteriorRings()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getInteriorRings()[1]->getPosition()->getAltitude());

        $this->assertEquals(100.8, $res->getPolygons()[1]->getInteriorRings()[2]->getPosition()->getLongitude());
        $this->assertEquals(0.8, $res->getPolygons()[1]->getInteriorRings()[2]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getInteriorRings()[2]->getPosition()->getAltitude());

        $this->assertEquals(100.8, $res->getPolygons()[1]->getInteriorRings()[3]->getPosition()->getLongitude());
        $this->assertEquals(0.2, $res->getPolygons()[1]->getInteriorRings()[3]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getInteriorRings()[3]->getPosition()->getAltitude());

        $this->assertEquals(100.2, $res->getPolygons()[1]->getInteriorRings()[4]->getPosition()->getLongitude());
        $this->assertEquals(0.2, $res->getPolygons()[1]->getInteriorRings()[4]->getPosition()->getLatitude());
        $this->assertNull($res->getPolygons()[1]->getInteriorRings()[4]->getPosition()->getAltitude());
    }

    /**
     * Tests the deserializePoint() method.
     *
     * @return void
     */
    public function testDeserializePoint(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializePoint.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializePoint($data["coordinates"]);
        $this->assertInstanceOf(Point::class, $res);

        $this->assertEquals(100.0, $res->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getPosition()->getLatitude());
        $this->assertNull($res->getPosition()->getAltitude());
    }

    /**
     * Tests the deserializePolygon() method.
     *
     * @return void
     */
    public function testDeserializePolygon(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializePolygon.json");
        $data = json_decode($json, true);

        $res = TestJsonDeserializer::deserializePolygon($data["coordinates"]);
        $this->assertInstanceOf(Polygon::class, $res);

        $this->assertEquals(100.0, $res->getExteriorRings()[0]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getExteriorRings()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getExteriorRings()[0]->getPosition()->getAltitude());

        $this->assertEquals(101.0, $res->getExteriorRings()[1]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getExteriorRings()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getExteriorRings()[1]->getPosition()->getAltitude());

        $this->assertEquals(101.0, $res->getExteriorRings()[2]->getPosition()->getLongitude());
        $this->assertEquals(1.0, $res->getExteriorRings()[2]->getPosition()->getLatitude());
        $this->assertNull($res->getExteriorRings()[2]->getPosition()->getAltitude());

        $this->assertEquals(100.0, $res->getExteriorRings()[3]->getPosition()->getLongitude());
        $this->assertEquals(1.0, $res->getExteriorRings()[3]->getPosition()->getLatitude());
        $this->assertNull($res->getExteriorRings()[3]->getPosition()->getAltitude());

        $this->assertEquals(100.0, $res->getExteriorRings()[4]->getPosition()->getLongitude());
        $this->assertEquals(0.0, $res->getExteriorRings()[4]->getPosition()->getLatitude());
        $this->assertNull($res->getExteriorRings()[4]->getPosition()->getAltitude());

        $this->assertEquals(100.8, $res->getInteriorRings()[0]->getPosition()->getLongitude());
        $this->assertEquals(0.8, $res->getInteriorRings()[0]->getPosition()->getLatitude());
        $this->assertNull($res->getInteriorRings()[0]->getPosition()->getAltitude());

        $this->assertEquals(100.8, $res->getInteriorRings()[1]->getPosition()->getLongitude());
        $this->assertEquals(0.2, $res->getInteriorRings()[1]->getPosition()->getLatitude());
        $this->assertNull($res->getInteriorRings()[1]->getPosition()->getAltitude());

        $this->assertEquals(100.2, $res->getInteriorRings()[2]->getPosition()->getLongitude());
        $this->assertEquals(0.2, $res->getInteriorRings()[2]->getPosition()->getLatitude());
        $this->assertNull($res->getInteriorRings()[2]->getPosition()->getAltitude());

        $this->assertEquals(100.2, $res->getInteriorRings()[3]->getPosition()->getLongitude());
        $this->assertEquals(0.8, $res->getInteriorRings()[3]->getPosition()->getLatitude());
        $this->assertNull($res->getInteriorRings()[3]->getPosition()->getAltitude());

        $this->assertEquals(100.8, $res->getInteriorRings()[4]->getPosition()->getLongitude());
        $this->assertEquals(0.8, $res->getInteriorRings()[4]->getPosition()->getLatitude());
        $this->assertNull($res->getInteriorRings()[4]->getPosition()->getAltitude());
    }
}
