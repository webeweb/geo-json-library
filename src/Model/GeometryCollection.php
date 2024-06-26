<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\GeoJson\Model;

use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Geometry collection.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
 */
class GeometryCollection extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_GEOMETRY_COLLECTION);
    }

    /**
     * Add a geometry.
     *
     * @param Geometry|null $geometry The geometry.
     * @return GeometryCollection Returns this geometry collection.
     */
    public function addGeometry(?Geometry $geometry): Geometry {
        return parent::addGeometry($geometry);
    }

    /**
     * {@inheritDoc}
     */
    public function getGeometries(): array {
        return parent::getGeometries();
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeGeometryCollection($this);
    }
}
