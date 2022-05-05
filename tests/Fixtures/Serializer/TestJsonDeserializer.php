<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Fixtures\Serializer;

use WBW\Library\GeoJson\Model\BoundingBox;
use WBW\Library\GeoJson\Model\Feature;
use WBW\Library\GeoJson\Model\Geometry;
use WBW\Library\GeoJson\Model\Geometry\LineString;
use WBW\Library\GeoJson\Model\Geometry\MultiLineString;
use WBW\Library\GeoJson\Model\Geometry\MultiPoint;
use WBW\Library\GeoJson\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Model\Geometry\Polygon;
use WBW\Library\GeoJson\Model\GeometryCollection;
use WBW\Library\GeoJson\Serializer\JsonDeserializer;

/**
 * Test JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Fixtures\Serializer
 */
class TestJsonDeserializer extends JsonDeserializer {

    /**
     * {@inheritdoc}
     */
    public static function deserializeBoundingBox(array $data): ?BoundingBox {
        return parent::deserializeBoundingBox($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeFeature(array $data): ?Feature {
        return parent::deserializeFeature($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeGeometry(array $data): ?Geometry {
        return parent::deserializeGeometry($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeGeometryCollection(array $data): GeometryCollection {
        return parent::deserializeGeometryCollection($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeLineString(array $data): LineString {
        return parent::deserializeLineString($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeMultiLineString(array $data): MultiLineString {
        return parent::deserializeMultiLineString($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeMultiPoint(array $data): MultiPoint {
        return parent::deserializeMultiPoint($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializeMultiPolygon(array $data): MultiPolygon {
        return parent::deserializeMultiPolygon($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializePoint(array $data): Point {
        return parent::deserializePoint($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function deserializePolygon(array $data): Polygon {
        return parent::deserializePolygon($data);
    }
}
