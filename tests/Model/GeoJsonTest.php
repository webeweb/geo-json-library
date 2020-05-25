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

use WBW\Library\GeoJSON\Tests\AbstractTestCase;
use WBW\Library\GeoJSON\Tests\Fixtures\Model\TestGeoJson;
use WBW\Library\GeoJSON\Model\GeoJson;

/**
 * Geo JSON test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class GeoJsonTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("Point", GeoJson::TYPE_POINT);
        $this->assertEquals("MultiPoint", GeoJson::TYPE_MULTIPOINT);
        $this->assertEquals("LineString", GeoJson::TYPE_LINESTRING);
        $this->assertEquals("MultiLineString", GeoJson::TYPE_MULTILINESTRING);
        $this->assertEquals("Polygon", GeoJson::TYPE_POLYGON);
        $this->assertEquals("MultiPolygon", GeoJson::TYPE_MULTIPOLYGON);
        $this->assertEquals("GeometryCollection", GeoJson::TYPE_GEOMETRYCOLLECTION);

        $this->assertEquals("Feature", GeoJson::TYPE_FEATURE);
        $this->assertEquals("FetaureCollection", GeoJson::TYPE_FEATURECOLLECTION);

        $obj = new TestGeoJson("type");

        $this->assert("type", $obj->getType());
    }
}