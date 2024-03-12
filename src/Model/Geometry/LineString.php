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
 * Line string.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model\Geometry
 */
class LineString extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_LINE_STRING);
    }

    /**
     * Add a point.
     *
     * @param Point|null $point The point.
     * @return LineString Returns this line string.
     */
    public function addPoint(?Point $point): LineString {
        return $this->addGeometry($point);
    }

    /**
     * Get the points.
     *
     * @return Point[] Returns the points.
     */
    public function getPoints(): array {

        /** @var Point[] $geometries */
        $geometries = $this->getGeometries();

        return $geometries;
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeLineString($this);
    }
}
