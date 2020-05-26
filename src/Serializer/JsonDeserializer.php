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

/**
 * JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Serializer
 */
class JsonDeserializer {

    /**
     * Deserializes a geometry.
     *
     * @param array $data The data.
     * @return Geometry Returns the geometry.
     */
    public static function deserializeGeometry(array $data) {

        $type = ArrayHelper::get($data, "type");
        if (false === in_array($type, GeoJson::enumTypes())) {
            return null;
        }

        $fct = __NAMESPACE__ . "\\JsonDeserializer::deserialize{$type}";
        $arg = ArrayHelper::get($data, "coordinates", []);

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
     * @return MultiPoint Returns the multi point.
     */
    protected static function deserializeMultiPoint(array $data) {

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
     * @return Point Returns the point.
     */
    protected static function deserializePoint(array $data) {

        $model = new Point();
        $model->setPosition(static::deserializePosition($data));

        return $model;
    }

    /**
     * Deserializes a polygon.
     *
     * @param array $data The data.
     * @return Polygon Returns the polygon.
     */
    protected static function deserializePolygon(array $data) {

        $model = new Polygon();
        foreach ($data[0] as $current) {
            $model->addExteriorRing(static::deserializePoint($current));
        }

        if (1 === count($data)) {
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
     * @return Position Returns the position.
     */
    protected static function deserializePosition(array $data) {

        $model = new Position();
        $model->setLongitude($data[0]);
        $model->setLatitude($data[1]);

        if (2 < count($data)) {
            $model->setAltitude($data[2]);
        }

        return $model;
    }
}