<?php

declare(strict_types = 1);

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Model;

use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Geo JSON interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class GeoJsonInterfaceTest extends AbstractTestCase {

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
    }
}
