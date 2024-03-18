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
    public const BBOX = "bbox";

    /**
     * Serializer key "coordinates".
     *
     * @var string
     */
    public const COORDINATES = "coordinates";

    /**
     * Serializer key "features".
     *
     * @var string
     */
    public const FEATURES = "features";

    /**
     * Serializer key "geometries".
     *
     * @var string
     */
    public const GEOMETRIES = "geometries";

    /**
     * Serializer key "geometry".
     *
     * @var string
     */
    public const GEOMETRY = "geometry";

    /**
     * Serializer key "properties".
     *
     * @var string
     */
    public const PROPERTIES = "properties";
}
