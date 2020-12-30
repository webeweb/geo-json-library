<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Serializer;

use JsonSerializable;
use WBW\Library\GeoJSON\Model\BoundingBox;
use WBW\Library\GeoJSON\Model\Feature;
use WBW\Library\GeoJSON\Model\FeatureCollection;
use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Model\Geometry\LineString;
use WBW\Library\GeoJSON\Model\Geometry\MultiLineString;
use WBW\Library\GeoJSON\Model\Geometry\MultiPoint;
use WBW\Library\GeoJSON\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJSON\Model\Geometry\Point;
use WBW\Library\GeoJSON\Model\Geometry\Polygon;
use WBW\Library\GeoJSON\Model\GeometryCollection;
use WBW\Library\GeoJSON\Model\Position;
use WBW\Library\GeoJSON\Model\Properties;

/**
 * JSON serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Serializer
 */
class JsonSerializer {

    /**
     * Serializes an array.
     *
     * @param GeoJson[] $models The models.
     * @return array Returns the serialized array.
     */
    protected static function serializeArray(array $models): array {

        $result = [];
        foreach ($models as $current) {
            $result[] = static::serializeModel($current);
        }

        return $result;
    }

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
            "bbox"       => static::serializeModel($model->getBoundingBox()),
            "geometry"   => static::serializeModel($model->getGeometry()),
            "properties" => static::serializeModel($model->getProperties()),
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
            "bbox"     => static::serializeModel($model->getBoundingBox()),
            "features" => static::serializeArray($model->getFeatures()),
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
            "geometries" => static::serializeArray($model->getGeometries()),
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
            "coordinates" => static::serializeArray($model->getPoints()),
        ];
    }

    /**
     * Serializes a geo JSON.
     *
     * @param JsonSerializable|null $model The geo JSON.
     * @return array|null Returns the serialized geo JSON in case of success, null otherwise.
     */
    protected static function serializeModel(?JsonSerializable $model): ?array {
        if (null === $model) {
            return null;
        }
        return $model->jsonSerialize();
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
            "coordinates" => static::serializeArray($model->getLineStrings()),
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
            "coordinates" => static::serializeArray($model->getPoints()),
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
            "coordinates" => static::serializeArray($model->getPolygons()),
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
            "coordinates" => static::serializeModel($model->getPosition()),
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
                static::serializeArray($model->getExteriorRings()),
                static::serializeArray($model->getInteriorRings()),
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