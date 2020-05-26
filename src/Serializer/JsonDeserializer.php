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

use WBW\Library\Core\Argument\Helper\ArrayHelper;
use WBW\Library\GeoJSON\Model\BoundingBox;
use WBW\Library\GeoJSON\Model\Feature;
use WBW\Library\GeoJSON\Model\FeatureCollection;
use WBW\Library\GeoJSON\Model\GeoJson;
use WBW\Library\GeoJSON\Model\Geometry;
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
 * JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Serializer
 */
class JsonDeserializer {

    /**
     * Deserializes a bounding box.
     *
     * @param array $data The data.
     * @return BoundingBox|null Returns the bounding box in case of success, null otherwise.
     */
    protected static function deserializeBoundingBox(array $data) {

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
     * @return Feature Returns the feature.
     */
    protected static function deserializeFeature(array $data) {

        $model = new Feature();
        $model->setBoundingBox(static::deserializeBoundingBox(ArrayHelper::get($data, "bbox", [])));
        $model->setGeometry(static::deserializeGeometry(ArrayHelper::get($data, "geometry", [])));
        $model->setProperties(static::deserializeProperties(ArrayHelper::get($data, "properties", [])));

        return $model;
    }

    /**
     * Deserialize a feature collection.
     *
     * @param array $data The data.
     * @return FeatureCollection Returns the feature collection.
     */
    public static function deserializeFeatureCollection(array $data) {

        $model = new FeatureCollection();
        $model->setBoundingBox(static::deserializeBoundingBox(ArrayHelper::get($data, "bbox", [])));
        foreach (ArrayHelper::get($data, "features", []) as $current) {
            $model->addFeature(static::deserializeFeature($current));
        }

        return $model;
    }

    /**
     * Deserializes a geometry.
     *
     * @param array $data The data.
     * @return Geometry|null Returns the geometry in case of success, null otherwise.
     */
    protected static function deserializeGeometry(array $data) {

        $type = ArrayHelper::get($data, "type");
        if (false === in_array($type, GeoJson::enumTypes())) {
            return null;
        }

        $fct = __NAMESPACE__ . "\\JsonDeserializer::deserialize{$type}";
        $key = GeoJson::TYPE_GEOMETRYCOLLECTION === $type ? "geometries" : "coordinates";

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
    protected static function deserializeGeometryCollection(array $data) {

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
     * @return LineString Returns the line string.
     */
    protected static function deserializeLineString(array $data) {

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
    protected static function deserializeMultiLineString(array $data) {

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
     * @return MultiPoint|null Returns the multi point in case of success, null otherwise.
     */
    protected static function deserializeMultiPoint(array $data) {

        if (0 === count($data)) {
            return null;
        }

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
    protected static function deserializeMultiPolygon(array $data) {

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
     * @return Point|null Returns the point in case of success, null otherwise.
     */
    protected static function deserializePoint(array $data) {

        if (0 === count($data)) {
            return null;
        }

        $model = new Point();
        $model->setPosition(static::deserializePosition($data));

        return $model;
    }

    /**
     * Deserializes a polygon.
     *
     * @param array $data The data.
     * @return Polygon|null Returns the polygon in case of success, null otherwise.
     */
    protected static function deserializePolygon(array $data) {

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
     * @return Position|null Returns the position in case of success, null otherwise.
     */
    protected static function deserializePosition(array $data) {

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
     * @return Properties|null Returns the properties in case of success, null otherwise.
     */
    protected static function deserializeProperties(array $data) {

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