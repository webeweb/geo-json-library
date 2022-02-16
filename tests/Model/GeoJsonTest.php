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
            GeoJson::TYPE_POINT,
            GeoJson::TYPE_MULTIPOINT,
            GeoJson::TYPE_LINESTRING,
            GeoJson::TYPE_MULTILINESTRING,
            GeoJson::TYPE_POLYGON,
            GeoJson::TYPE_MULTIPOLYGON,
            GeoJson::TYPE_GEOMETRYCOLLECTION,
        ];

        $this->assertEquals($res, GeoJson::enumTypes());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("Point", GeoJson::TYPE_POINT);
        $this->assertEquals("MultiPoint", GeoJson::TYPE_MULTIPOINT);
        $this->assertEquals("LineString", GeoJson::TYPE_LINESTRING);
        $this->assertEquals("MultiLineString", GeoJson::TYPE_MULTILINESTRING);
        $this->assertEquals("Polygon", GeoJson::TYPE_POLYGON);
        $this->assertEquals("MultiPolygon", GeoJson::TYPE_MULTIPOLYGON);
        $this->assertEquals("GeometryCollection", GeoJson::TYPE_GEOMETRYCOLLECTION);

        $this->assertEquals("Feature", GeoJson::TYPE_FEATURE);
        $this->assertEquals("FeatureCollection", GeoJson::TYPE_FEATURECOLLECTION);

        $obj = new TestGeoJson("type");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals("type", $obj->getType());
    }
}
