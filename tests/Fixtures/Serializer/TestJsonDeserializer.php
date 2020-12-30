<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Fixtures\Serializer;

use WBW\Library\GeoJSON\Model\BoundingBox;
use WBW\Library\GeoJSON\Model\Feature;
use WBW\Library\GeoJSON\Model\Geometry;
use WBW\Library\GeoJSON\Model\Geometry\LineString;
use WBW\Library\GeoJSON\Model\Geometry\MultiLineString;
use WBW\Library\GeoJSON\Model\Geometry\MultiPoint;
use WBW\Library\GeoJSON\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJSON\Model\Geometry\Point;
use WBW\Library\GeoJSON\Model\Geometry\Polygon;
use WBW\Library\GeoJSON\Model\GeometryCollection;
use WBW\Library\GeoJSON\Serializer\JsonDeserializer;

/**
 * Test JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Fixtures\Serializer
 */
class TestJsonDeserializer extends JsonDeserializer {

    /**
     * {@inheritDoc}
     */
    public static function deserializeBoundingBox(array $data): ?BoundingBox {
        return parent::deserializeBoundingBox($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeFeature(array $data): ?Feature {
        return parent::deserializeFeature($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeGeometry(array $data): ?Geometry {
        return parent::deserializeGeometry($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeGeometryCollection(array $data): GeometryCollection {
        return parent::deserializeGeometryCollection($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeLineString(array $data): LineString {
        return parent::deserializeLineString($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeMultiLineString(array $data): MultiLineString {
        return parent::deserializeMultiLineString($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeMultiPoint(array $data): MultiPoint {
        return parent::deserializeMultiPoint($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeMultiPolygon(array $data): MultiPolygon {
        return parent::deserializeMultiPolygon($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializePoint(array $data): Point {
        return parent::deserializePoint($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializePolygon(array $data): Polygon {
        return parent::deserializePolygon($data);
    }
}