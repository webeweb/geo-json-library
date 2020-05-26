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
     * Geometries.
     *
     * @var Geometry[]
     */
    private $geometries;

    /**
     * Constructor.
     *
     * @param string $type The type.
     */
    protected function __construct($type) {
        parent::__construct($type);
        $this->setGeometries([]);
    }

    /**
     * Add a geometry.
     *
     * @param Geometry $geometry The geometry.
     * @return Geometry Returns this geometry.
     */
    protected function addGeometry(Geometry $geometry) {
        $this->geometries[] = $geometry;
        return $this;
    }

    /**
     * Get the geometries.
     *
     * @return Geometry[] Returns the geometries.
     */
    protected function getGeometries() {
        return $this->geometries;
    }

    /**
     * Set the positions.
     *
     * @param Geometry[] $geometries The geometries.
     * @return Geometry Returns this geometry.
     */
    protected function setGeometries(array $geometries) {
        $this->geometries = $geometries;
        return $this;
    }
}