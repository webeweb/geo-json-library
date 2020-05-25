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

/**
 * Geometry.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Model
 * @abstract
 */
abstract class Geometry extends GeoJson {

    /**
     * Coordinates.
     *
     * @var Position[]
     */
    private $coordinates;

    /**
     * Constructor.
     *
     * @param string $type The type.
     */
    protected function __construct($type) {
        parent::__construct($type);
        $this->setCoordinates([]);
    }

    /**
     * Add a coordinate.
     *
     * @param Position $coordinate The coodinate.
     * @return Geometry Returns this geometry.
     */
    public function addCoordinate(Position $coordinate) {
        $this->coordinates[] = $coordinate;
        return $this;
    }

    /**
     * Get the coordinates.
     *
     * @return Position[] Returns the coordinates.
     */
    public function getCoordinates() {
        return $this->coordinates;
    }

    /**
     * Set the positions.
     *
     * @param Position[] $coordinates The coordinates.
     * @return Geometry Returns this geometry.
     */
    protected function setCoordinates(array $coordinates) {
        $this->coordinates = $coordinates;
        return $this;
    }
}