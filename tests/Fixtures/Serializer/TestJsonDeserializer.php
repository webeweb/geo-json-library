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
    public static function deserializeBoundingBox(array $data) {
        return parent::deserializeBoundingBox($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeFeature(array $data) {
        return parent::deserializeFeature($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeGeometry(array $data) {
        return parent::deserializeGeometry($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeGeometryCollection(array $data) {
        return parent::deserializeGeometryCollection($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeLineString(array $data) {
        return parent::deserializeLineString($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeMultiLineString(array $data) {
        return parent::deserializeMultiLineString($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeMultiPoint(array $data) {
        return parent::deserializeMultiPoint($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeMultiPolygon(array $data) {
        return parent::deserializeMultiPolygon($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializePoint(array $data) {
        return parent::deserializePoint($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializePolygon(array $data) {
        return parent::deserializePolygon($data);
    }
}