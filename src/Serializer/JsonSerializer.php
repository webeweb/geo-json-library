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

/**
 * JSON serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Serializer
 */
class JsonSerializer {

    /**
     * Serializes a bounding box.
     *
     * @param BoundingBox $model The bounding box.
     * @return array Returns the serialized bounding box.
     */
    public static function serializeBoundingBox(BoundingBox $model): array {
        return $model->getValues();
    }

    /**
     * Serializes a feature.
     *
     * @param Feature $model The feature.
     * @return array Returns the serialized feature.
     */
    public static function serializeFeature(Feature $model): array {

        return [
            "type"       => $model->getType(),
            "bbox"       => JsonSerializerHelper::jsonSerializeModel($model->getBoundingBox()),
            "geometry"   => JsonSerializerHelper::jsonSerializeModel($model->getGeometry()),
            "properties" => JsonSerializerHelper::jsonSerializeModel($model->getProperties()),
        ];
    }

    /**
     * Serializes a feature collection.
     *
     * @param FeatureCollection $model The feature collection.
     * @return array Returns the serialized feature collection.
     */
    public static function serializeFeatureCollection(FeatureCollection $model): array {

        $result = [
            "type"     => $model->getType(),
            "bbox"     => JsonSerializerHelper::jsonSerializeModel($model->getBoundingBox()),
            "features" => JsonSerializerHelper::jsonSerializeArray($model->getFeatures()),
        ];

        return array_merge($result, $model->getForeignMembers());
    }

    /**
     * Serializes a geometry collection.
     *
     * @param GeometryCollection $model The geometry collection.
     * @return array Returns the serialized geometry collection.
     */
    public static function serializeGeometryCollection(GeometryCollection $model): array {

        return [
            "type"       => $model->getType(),
            "geometries" => JsonSerializerHelper::jsonSerializeArray($model->getGeometries()),
        ];
    }

    /**
     * Serializes a line string.
     *
     * @param LineString $model The line string.
     * @return array Returns the serialized line string.
     */
    public static function serializeLineString(LineString $model): array {

        return [
            "type"        => $model->getType(),
            "coordinates" => JsonSerializerHelper::jsonSerializeArray($model->getPoints()),
        ];
    }

    /**
     * Serializes a multi line string.
     *
     * @param MultiLineString $model The multi line string.
     * @return array Returns the serialized multi line string.
     */
    public static function serializeMultiLineString(MultiLineString $model): array {

        return [
            "type"        => $model->getType(),
            "coordinates" => JsonSerializerHelper::jsonSerializeArray($model->getLineStrings()),
        ];
    }

    /**
     * Serializes a multi point.
     *
     * @param MultiPoint $model The multi point.
     * @return array Returns the serialized multi point.
     */
    public static function serializeMultiPoint(MultiPoint $model): array {

        return [
            "type"        => $model->getType(),
            "coordinates" => JsonSerializerHelper::jsonSerializeArray($model->getPoints()),
        ];
    }

    /**
     * Serializes a multi polygon.
     *
     * @param MultiPolygon $model The multi polygon.
     * @return array Returns the serialized multi polygon.
     */
    public static function serializeMultiPolygon(MultiPolygon $model): array {

        return [
            "type"        => $model->getType(),
            "coordinates" => JsonSerializerHelper::jsonSerializeArray($model->getPolygons()),
        ];
    }

    /**
     * Serializes a point.
     *
     * @param Point $model The point.
     * @return array Returns the serialized point.
     */
    public static function serializePoint(Point $model): array {

        return [
            "type"        => $model->getType(),
            "coordinates" => JsonSerializerHelper::jsonSerializeModel($model->getPosition()),
        ];
    }

    /**
     * Serializes a polygon.
     *
     * @param Polygon $model The polygon.
     * @return array Returns the serialized polygon.
     */
    public static function serializePolygon(Polygon $model): array {

        return [
            "type"        => $model->getType(),
            "coordinates" => [
                JsonSerializerHelper::jsonSerializeArray($model->getExteriorRings()),
                JsonSerializerHelper::jsonSerializeArray($model->getInteriorRings()),
            ],
        ];
    }

    /**
     * Serializes a position.
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
     * Serializes a properties.
     *
     * @param Properties $model The properties.
     * @return array Returns the serialized properties.
     */
    public static function serializeProperties(Properties $model): array {
        return $model->getProperties();
    }
}
