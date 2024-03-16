<?php

declare(strict_types = 1);

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2023 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Serializer;

/**
 * Serializer keys.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Serializer
 */
class SerializerKeys {

    /**
     * Serializer key "bbox".
     *
     * @var string
     */
    const BBOX = "bbox";

    /**
     * Serializer key "coordinates".
     *
     * @var string
     */
    const COORDINATES = "coordinates";

    /**
     * Serializer key "features".
     *
     * @var string
     */
    const FEATURES = "features";

    /**
     * Serializer key "geometries".
     *
     * @var string
     */
    const GEOMETRIES = "geometries";

    /**
     * Serializer key "geometry".
     *
     * @var string
     */
    const GEOMETRY = "geometry";

    /**
     * Serializer key "properties".
     *
     * @var string
     */
    const PROPERTIES = "properties";
}
