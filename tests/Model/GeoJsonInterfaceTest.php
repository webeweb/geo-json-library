<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Model;

use WBW\Library\GeoJSON\Model\GeoJsonInterface;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;

/**
 * Geo JSON interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class GeoJsonInterfaceTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
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
    }
}