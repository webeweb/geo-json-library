<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Model;

/**
 * Geo JSON interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
 */
interface GeoJsonInterface {

    /**
     * Type "feature".
     *
     * @var string
     */
    const TYPE_FEATURE = "Feature";

    /**
     * Type "feature collection".
     *
     * @var string
     */
    const TYPE_FEATURE_COLLECTION = "FeatureCollection";

    /**
     * Type "geometry collection".
     *
     * @var string
     */
    const TYPE_GEOMETRY_COLLECTION = "GeometryCollection";

    /**
     * Type "line string".
     *
     * @var string
     */
    const TYPE_LINE_STRING = "LineString";

    /**
     * Type "multi line".
     *
     * @var string
     */
    const TYPE_MULTI_LINE = "MultiLine";

    /**
     * Type "multi line string".
     *
     * @var string
     */
    const TYPE_MULTI_LINE_STRING = "MultiLineString";

    /**
     * Type "multi point".
     *
     * @var string
     */
    const TYPE_MULTI_POINT = "MultiPoint";

    /**
     * Type "multi polygon".
     *
     * @var string
     */
    const TYPE_MULTI_POLYGON = "MultiPolygon";

    /**
     * Type "point".
     *
     * @var string
     */
    const TYPE_POINT = "Point";

    /**
     * Type "polygon".
     *
     * @var string
     */
    const TYPE_POLYGON = "Polygon";
}
