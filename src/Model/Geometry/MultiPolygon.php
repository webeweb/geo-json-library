<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Model\Geometry;

use WBW\Library\GeoJson\Model\Geometry;
use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * MultiPolygon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model\Geometry
 */
class MultiPolygon extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_MULTI_POLYGON);
    }

    /**
     * Add a polygon.
     *
     * @param Polygon|null $polygon The polygon.
     * @return MultiPolygon Returns this multi polygon.
     */
    public function addPolygon(?Polygon $polygon): MultiPolygon {
        return $this->addGeometry($polygon);
    }

    /**
     * Get the polygons.
     *
     * @return Polygon[] Returns the polygons.
     */
    public function getPolygons(): array {
        return $this->getGeometries();
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeMultiPolygon($this);
    }
}
