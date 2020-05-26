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

/**
 * Polygon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model\Geometry
 */
class Polygon extends Geometry {

    /**
     * Exterior rings.
     *
     * @var Point[]
     */
    private $exteriorRings;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_POLYGON);
        $this->setExteriorRings([]);
    }

    /**
     * Add an exterior ring.
     *
     * @param Point $point The exterior ring.
     * @return Polygon Returns this polygon.
     */
    public function addExteriorRing(Point $point) {
        $this->exteriorRings[] = $point;
        return $this;
    }

    /**
     * Add an interior ring.
     *
     * @param Point $point The interior ring.
     * @return Polygon Returns this polygon.
     */
    public function addInteriorRing(Point $point) {
        return $this->addGeometry($point);
    }

    /**
     * Get the exterior rings.
     *
     * @return Point[] Returns the exterior rings.
     */
    public function getExteriorRings() {
        return $this->exteriorRings;
    }

    /**
     * Get the interior rings.
     *
     * @return Point[] Returns the interior rings.
     */
    public function getInteriorRings() {
        return $this->getGeometries();
    }

    /**
     * Set the exterior rings.
     *
     * @param Point[] $exteriorRings The exterior rings.
     * @return Polygon Returns this polygon.
     */
    protected function setExteriorRings(array $exteriorRings) {
        $this->exteriorRings = $exteriorRings;
        return $this;
    }
}