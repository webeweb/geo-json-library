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
use WBW\Library\GeoJson\Model\GeoJson;
use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Model\Geometry;
use WBW\Library\GeoJson\Model\Geometry\LineString;
use WBW\Library\GeoJson\Model\Geometry\MultiLineString;
use WBW\Library\GeoJson\Model\Geometry\MultiPoint;
use WBW\Library\GeoJson\Model\Geometry\MultiPolygon;
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Model\Geometry\Polygon;
use WBW\Library\GeoJson\Model\GeometryCollection;
use WBW\Library\GeoJson\Model\Position;
use WBW\Library\GeoJson\Model\Properties;
use WBW\Library\Types\Helper\ArrayHelper;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Serializer
 */
class JsonDeserializer {

    /**
     * Deserializes a bounding box.
     *
     * @param array $data The data.
     * @return BoundingBox|null Returns the bounding box.
     */
    protected static function deserializeBoundingBox(array $data): ?BoundingBox {

        if (0 === count($data)) {
            return null;
        }

        $model = new BoundingBox();
        foreach ($data as $current) {
            $model->addValue($current);
        }

        return $model;
    }

    /**
     * Deserializes a feature.
     *
     * @param array $data The data.
     * @return Feature|null Returns the feature.
     */
    protected static function deserializeFeature(array $data): ?Feature {

        if (GeoJsonInterface::TYPE_FEATURE !== ArrayHelper::get($data, BaseSerializerKeys::TYPE)) {
            return null;
        }

        $model = new Feature();
        $model->setBoundingBox(static::deserializeBoundingBox(ArrayHelper::get($data, SerializerKeys::BBOX, [])));
        $model->setGeometry(static::deserializeGeometry(ArrayHelper::get($data, SerializerKeys::GEOMETRY, [])));
        $model->setProperties(static::deserializeProperties(ArrayHelper::get($data, SerializerKeys::PROPERTIES, [])));

        return $model;
    }

    /**
     * Deserialize a feature collection.
     *
     * @param array $data The data.
     * @return FeatureCollection Returns the feature collection.
     */
    public static function deserializeFeatureCollection(array $data): FeatureCollection {

        $model = new FeatureCollection();
        $model->setBoundingBox(static::deserializeBoundingBox(ArrayHelper::get($data, SerializerKeys::BBOX, [])));

        foreach (ArrayHelper::get($data, SerializerKeys::FEATURES, []) as $current) {
            $model->addFeature(static::deserializeFeature($current));
        }

        foreach ($data as $k => $v) {
            if (true === in_array($k, [BaseSerializerKeys::TYPE, SerializerKeys::BBOX, SerializerKeys::FEATURES])) {
                continue;
            }
            $model->addForeignMember($k, $v);
        }

        return $model;
    }

    /**
     * Deserializes a geometry.
     *
     * @param array $data The data.
     * @return Geometry|null Returns the geometry.
     */
    protected static function deserializeGeometry(array $data): ?Geometry {

        $type = ArrayHelper::get($data, BaseSerializerKeys::TYPE);
        if (false === in_array($type, GeoJson::enumTypes())) {
            return null;
        }

        $fct = __NAMESPACE__ . "\\JsonDeserializer::deserialize$type";
        $key = GeoJsonInterface::TYPE_GEOMETRY_COLLECTION === $type ? SerializerKeys::GEOMETRIES : SerializerKeys::COORDINATES;

        $arg = ArrayHelper::get($data, $key, []);
        if (0 === count($arg)) {
            return null;
        }

        return call_user_func_array($fct, [$arg]);
    }

    /**
     * Deserializes a geometry collection.
     *
     * @param array $data The data.
     * @return GeometryCollection Returns the geometry collection.
     */
    protected static function deserializeGeometryCollection(array $data): GeometryCollection {

        $model = new GeometryCollection();
        foreach ($data as $current) {
            $model->addGeometry(static::deserializeGeometry($current));
        }

        return $model;
    }

    /**
     * Deserializes a line string.
     *
     * @param array $data The data.
     * @return LineString|null Returns the line string.
     */
    protected static function deserializeLineString(array $data): ?LineString {

        $model = new LineString();
        foreach ($data as $current) {
            $model->addPoint(static::deserializePoint($current));
        }

        return $model;
    }

    /**
     * Deserializes a multi line string.
     *
     * @param array $data The data.
     * @return MultiLineString Returns the multi line string.
     */
    protected static function deserializeMultiLineString(array $data): MultiLineString {

        $model = new MultiLineString();
        foreach ($data as $current) {
            $model->addLineString(static::deserializeLineString($current));
        }

        return $model;
    }

    /**
     * Deserializes a multi point.
     *
     * @param array $data The data.
     * @return MultiPoint|null Returns the multi point.
     */
    protected static function deserializeMultiPoint(array $data): ?MultiPoint {

        $model = new MultiPoint();
        foreach ($data[0] as $current) {
            $model->addPoint(static::deserializePoint($current));
        }

        return $model;
    }

    /**
     * Deserializes a multi polygon.
     *
     * @param array $data The data.
     * @return MultiPolygon Returns the multi polygon.
     */
    protected static function deserializeMultiPolygon(array $data): MultiPolygon {

        $model = new MultiPolygon();
        foreach ($data as $current) {
            $model->addPolygon(static::deserializePolygon($current));
        }

        return $model;
    }

    /**
     * Deserializes a point.
     *
     * @param array $data The data.
     * @return Point|null Returns the point.
     */
    protected static function deserializePoint(array $data): ?Point {

        $model = new Point();
        $model->setPosition(static::deserializePosition($data));

        return $model;
    }

    /**
     * Deserializes a polygon.
     *
     * @param array $data The data.
     * @return Polygon|null Returns the polygon.
     */
    protected static function deserializePolygon(array $data): ?Polygon {

        $nb = count($data);
        if (0 === $nb) {
            return null;
        }

        $model = new Polygon();
        foreach ($data[0] as $current) {
            $model->addExteriorRing(static::deserializePoint($current));
        }

        if (1 === $nb) {
            return $model;
        }

        foreach ($data[1] as $current) {
            $model->addInteriorRing(static::deserializePoint($current));
        }

        return $model;
    }

    /**
     * Deserializes a position.
     *
     * @param array $data The data.
     * @return Position|null Returns the position.
     */
    protected static function deserializePosition(array $data): ?Position {

        $nb = count($data);
        if ($nb < 2) {
            return null;
        }

        $model = new Position();
        $model->setLongitude($data[0]);
        $model->setLatitude($data[1]);
        $model->setAltitude(2 < $nb ? $data[2] : null);

        return $model;
    }

    /**
     * Deserializes a properties.
     *
     * @param array $data The data.
     * @return Properties|null Returns the properties.
     */
    protected static function deserializeProperties(array $data): ?Properties {

        if (0 === count($data)) {
            return null;
        }

        $model = new Properties();
        foreach ($data as $k => $v) {
            $model->addProperty($k, $v);
        }

        return $model;
    }
}
