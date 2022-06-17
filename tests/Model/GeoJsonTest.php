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
use WBW\Library\GeoJson\Model\GeoJson;
use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Tests\AbstractTestCase;
use WBW\Library\GeoJson\Tests\Fixtures\Model\TestGeoJson;

/**
 * Geo JSON test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class GeoJsonTest extends AbstractTestCase {

    /**
     * Tests enumTypes()
     *
     * @return void
     */
    public function testEnumTypes(): void {

        $res = [
            GeoJsonInterface::TYPE_POINT,
            GeoJsonInterface::TYPE_MULTIPOINT,
            GeoJsonInterface::TYPE_LINESTRING,
            GeoJsonInterface::TYPE_MULTILINESTRING,
            GeoJsonInterface::TYPE_POLYGON,
            GeoJsonInterface::TYPE_MULTIPOLYGON,
            GeoJsonInterface::TYPE_GEOMETRYCOLLECTION,
        ];

        $this->assertEquals($res, GeoJson::enumTypes());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("Point", GeoJsonInterface::TYPE_POINT);
        $this->assertEquals("MultiPoint", GeoJsonInterface::TYPE_MULTIPOINT);
        $this->assertEquals("LineString", GeoJsonInterface::TYPE_LINESTRING);
        $this->assertEquals("MultiLineString", GeoJsonInterface::TYPE_MULTILINESTRING);
        $this->assertEquals("Polygon", GeoJsonInterface::TYPE_POLYGON);
        $this->assertEquals("MultiPolygon", GeoJsonInterface::TYPE_MULTIPOLYGON);
        $this->assertEquals("GeometryCollection", GeoJsonInterface::TYPE_GEOMETRYCOLLECTION);

        $this->assertEquals("Feature", GeoJsonInterface::TYPE_FEATURE);
        $this->assertEquals("FeatureCollection", GeoJsonInterface::TYPE_FEATURECOLLECTION);

        $obj = new TestGeoJson("type");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals("type", $obj->getType());
    }
}
