<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Serializer;

use WBW\Library\GeoJson\Model\BoundingBox;
use WBW\Library\GeoJson\Model\Feature;
use WBW\Library\GeoJson\Model\FeatureCollection;
use WBW\Library\GeoJson\Model\Geometry\LineString;
use WBW\Library\GeoJson\Model\Geometry\MultiLineString;
use WBW\Library\GeoJson\Model\Geometry\MultiPoint;
use WBW\Library\GeoJson\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Model\Geometry\Polygon;
use WBW\Library\GeoJson\Model\GeometryCollection;
use WBW\Library\GeoJson\Model\Position;
use WBW\Library\GeoJson\Model\Properties;
use WBW\Library\Serializer\Helper\JsonSerializerHelper;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * JSON serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Serializer
 */
class JsonSerializer {

    /**
     * Serialize a bounding box.
     *
     * @param BoundingBox $model The bounding box.
     * @return array Returns the serialized bounding box.
     */
    public static function serializeBoundingBox(BoundingBox $model): array {
        return $model->getValues();
    }

    /**
     * Serialize a feature.
     *
     * @param Feature $model The feature.
     * @return array Returns the serialized feature.
     */
    public static function serializeFeature(Feature $model): array {

        return [
            BaseSerializerKeys::TYPE   => $model->getType(),
            SerializerKeys::BBOX       => JsonSerializerHelper::jsonSerializeModel($model->getBoundingBox()),
            SerializerKeys::GEOMETRY   => JsonSerializerHelper::jsonSerializeModel($model->getGeometry()),
            SerializerKeys::PROPERTIES => JsonSerializerHelper::jsonSerializeModel($model->getProperties()),
        ];
    }

    /**
     * Serialize a feature collection.
     *
     * @param FeatureCollection $model The feature collection.
     * @return array Returns the serialized feature collection.
     */
    public static function serializeFeatureCollection(FeatureCollection $model): array {

        $result = [
            BaseSerializerKeys::TYPE => $model->getType(),
            SerializerKeys::BBOX     => JsonSerializerHelper::jsonSerializeModel($model->getBoundingBox()),
            SerializerKeys::FEATURES => JsonSerializerHelper::jsonSerializeArray($model->getFeatures()),
        ];

        return array_merge($result, $model->getForeignMembers());
    }

    /**
     * Serialize a geometry collection.
     *
     * @param GeometryCollection $model The geometry collection.
     * @return array Returns the serialized geometry collection.
     */
    public static function serializeGeometryCollection(GeometryCollection $model): array {

        return [
            BaseSerializerKeys::TYPE   => $model->getType(),
            SerializerKeys::GEOMETRIES => JsonSerializerHelper::jsonSerializeArray($model->getGeometries()),
        ];
    }

    /**
     * Serialize a line string.
     *
     * @param LineString $model The line string.
     * @return array Returns the serialized line string.
     */
    public static function serializeLineString(LineString $model): array {

        return [
            BaseSerializerKeys::TYPE    => $model->getType(),
            SerializerKeys::COORDINATES => JsonSerializerHelper::jsonSerializeArray($model->getPoints()),
        ];
    }

    /**
     * Serialize a multi line string.
     *
     * @param MultiLineString $model The multi line string.
     * @return array Returns the serialized multi line string.
     */
    public static function serializeMultiLineString(MultiLineString $model): array {

        return [
            BaseSerializerKeys::TYPE    => $model->getType(),
            SerializerKeys::COORDINATES => JsonSerializerHelper::jsonSerializeArray($model->getLineStrings()),
        ];
    }

    /**
     * Serialize a multi point.
     *
     * @param MultiPoint $model The multi point.
     * @return array Returns the serialized multi point.
     */
    public static function serializeMultiPoint(MultiPoint $model): array {

        return [
            BaseSerializerKeys::TYPE    => $model->getType(),
            SerializerKeys::COORDINATES => JsonSerializerHelper::jsonSerializeArray($model->getPoints()),
        ];
    }

    /**
     * Serialize a multi polygon.
     *
     * @param MultiPolygon $model The multi polygon.
     * @return array Returns the serialized multi polygon.
     */
    public static function serializeMultiPolygon(MultiPolygon $model): array {

        return [
            BaseSerializerKeys::TYPE    => $model->getType(),
            SerializerKeys::COORDINATES => JsonSerializerHelper::jsonSerializeArray($model->getPolygons()),
        ];
    }

    /**
     * Serialize a point.
     *
     * @param Point $model The point.
     * @return array Returns the serialized point.
     */
    public static function serializePoint(Point $model): array {

        return [
            BaseSerializerKeys::TYPE    => $model->getType(),
            SerializerKeys::COORDINATES => JsonSerializerHelper::jsonSerializeModel($model->getPosition()),
        ];
    }

    /**
     * Serialize a polygon.
     *
     * @param Polygon $model The polygon.
     * @return array Returns the serialized polygon.
     */
    public static function serializePolygon(Polygon $model): array {

        return [
            BaseSerializerKeys::TYPE    => $model->getType(),
            SerializerKeys::COORDINATES => [
                JsonSerializerHelper::jsonSerializeArray($model->getExteriorRings()),
                JsonSerializerHelper::jsonSerializeArray($model->getInteriorRings()),
            ],
        ];
    }

    /**
     * Serialize a position.
     *
     * @param Position $model The position.
     * @return array Returns the serialized position.
     */
    public static function serializePosition(Position $model): array {

        return [
            $model->getLongitude(),
            $model->getLatitude(),
            $model->getAltitude(),
        ];
    }

    /**
     * Serialize a properties.
     *
     * @param Properties $model The properties.
     * @return array Returns the serialized properties.
     */
    public static function serializeProperties(Properties $model): array {
        return $model->getProperties();
    }
}
