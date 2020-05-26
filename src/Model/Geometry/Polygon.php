<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Model\Geometry;

use WBW\Library\GeoJSON\Model\Geometry;
use WBW\Library\GeoJSON\Serializer\JsonSerializer;

/**
 * Polygon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model\Geometry
 */
class Polygon extends Geometry {

    /**
     * Interior rings.
     *
     * @var Point[]
     */
    private $interiorRings;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_POLYGON);
        $this->setInteriorRings([]);
    }

    /**
     * Add an exterior ring.
     *
     * @param Point|null $exteriorRing The exterior ring.
     * @return Polygon Returns this polygon.
     */
    public function addExteriorRing(Point $exteriorRing = null) {
        return $this->addGeometry($exteriorRing);
    }

    /**
     * Add an interior ring.
     *
     * @param Point|null $interiorRing The interior ring.
     * @return Polygon Returns this polygon.
     */
    public function addInteriorRing(Point $interiorRing = null) {
        if (null !== $interiorRing) {
            $this->interiorRings[] = $interiorRing;
        }
        return $this;
    }

    /**
     * Get the exterior rings.
     *
     * @return Point[] Returns the exterior rings.
     */
    public function getExteriorRings() {
        return $this->getGeometries();
    }

    /**
     * Get the exterior rings.
     *
     * @return Point[] Returns the exterior rings.
     */
    public function getInteriorRings() {
        return $this->interiorRings;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializePolygon($this);
    }

    /**
     * Set the interior rings.
     *
     * @param Point[] $interiorRings The interior rings.
     * @return Polygon Returns this polygon.
     */
    protected function setInteriorRings(array $interiorRings) {
        $this->interiorRings = $interiorRings;
        return $this;
    }
}