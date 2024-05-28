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
     * Test enumTypes()
     *
     * @return void
     */
    public function testEnumTypes(): void {

        $res = [
            GeoJsonInterface::TYPE_POINT,
            GeoJsonInterface::TYPE_MULTI_POINT,
            GeoJsonInterface::TYPE_LINE_STRING,
            GeoJsonInterface::TYPE_MULTI_LINE_STRING,
            GeoJsonInterface::TYPE_POLYGON,
            GeoJsonInterface::TYPE_MULTI_POLYGON,
            GeoJsonInterface::TYPE_GEOMETRY_COLLECTION,
        ];

        $this->assertEquals($res, GeoJson::enumTypes());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("Point", GeoJsonInterface::TYPE_POINT);
        $this->assertEquals("MultiPoint", GeoJsonInterface::TYPE_MULTI_POINT);
        $this->assertEquals("LineString", GeoJsonInterface::TYPE_LINE_STRING);
        $this->assertEquals("MultiLineString", GeoJsonInterface::TYPE_MULTI_LINE_STRING);
        $this->assertEquals("Polygon", GeoJsonInterface::TYPE_POLYGON);
        $this->assertEquals("MultiPolygon", GeoJsonInterface::TYPE_MULTI_POLYGON);
        $this->assertEquals("GeometryCollection", GeoJsonInterface::TYPE_GEOMETRY_COLLECTION);

        $this->assertEquals("Feature", GeoJsonInterface::TYPE_FEATURE);
        $this->assertEquals("FeatureCollection", GeoJsonInterface::TYPE_FEATURE_COLLECTION);

        $obj = new TestGeoJson("type");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals("type", $obj->getType());
    }
}
