<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Model;

use JsonSerializable;
use WBW\Library\Core\Model\Attribute\StringTypeTrait;

/**
 * Geo JSON.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model
 * @abstract
 */
abstract class GeoJson implements JsonSerializable {

    use StringTypeTrait {
        setType as private;
    }

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
    const TYPE_FEATURECOLLECTION = "FeatureCollection";

    /**
     * Type "geometry collection".
     *
     * @var string
     */
    const TYPE_GEOMETRYCOLLECTION = "GeometryCollection";

    /**
     * Type "line string".
     *
     * @var string
     */
    const TYPE_LINESTRING = "LineString";

    /**
     * Type "multi line".
     *
     * @var string
     */
    const TYPE_MULTILINE = "MultiLine";

    /**
     * Type "multi line string".
     *
     * @var string
     */
    const TYPE_MULTILINESTRING = "MultiLineString";

    /**
     * Type "multi point".
     *
     * @var string
     */
    const TYPE_MULTIPOINT = "MultiPoint";

    /**
     * Type "multi polygon".
     *
     * @var string
     */
    const TYPE_MULTIPOLYGON = "MultiPolygon";

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

    /**
     * Constructor.
     *
     * @param string $type The type.
     */
    protected function __construct(string $type) {
        $this->setType($type);
    }

    /**
     * Enumerates the types.
     *
     * @return string[] Returns the types.
     */
    public static function enumTypes(): array {
        return [
            static::TYPE_POINT,
            static::TYPE_MULTIPOINT,
            static::TYPE_LINESTRING,
            static::TYPE_MULTILINESTRING,
            static::TYPE_POLYGON,
            static::TYPE_MULTIPOLYGON,
            static::TYPE_GEOMETRYCOLLECTION,
        ];
    }
}