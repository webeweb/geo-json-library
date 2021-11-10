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
use WBW\Library\Traits\Strings\StringTypeTrait;

/**
 * Geo JSON.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model
 * @abstract
 */
abstract class GeoJson implements JsonSerializable, GeoJsonInterface {

    use StringTypeTrait {
        setType as private;
    }

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
            self::TYPE_POINT,
            self::TYPE_MULTIPOINT,
            self::TYPE_LINESTRING,
            self::TYPE_MULTILINESTRING,
            self::TYPE_POLYGON,
            self::TYPE_MULTIPOLYGON,
            self::TYPE_GEOMETRYCOLLECTION,
        ];
    }
}