<?php

declare(strict_types = 1);

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Model;

use JsonSerializable;
use WBW\Library\Traits\Strings\StringTypeTrait;

/**
 * Geo JSON.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
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
     * Enumerate the types.
     *
     * @return string[] Returns the types.
     */
    public static function enumTypes(): array {

        return [
            self::TYPE_POINT,
            self::TYPE_MULTI_POINT,
            self::TYPE_LINE_STRING,
            self::TYPE_MULTI_LINE_STRING,
            self::TYPE_POLYGON,
            self::TYPE_MULTI_POLYGON,
            self::TYPE_GEOMETRY_COLLECTION,
        ];
    }
}
