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

/**
 * Geometry.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
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
    protected function __construct(string $type) {
        parent::__construct($type);

        $this->setGeometries([]);
    }

    /**
     * Add a geometry.
     *
     * @param Geometry|null $geometry The geometry.
     * @return $this Returns this geometry.
     */
    protected function addGeometry(?Geometry $geometry): Geometry {

        if (null !== $geometry) {
            $this->geometries[] = $geometry;
        }

        return $this;
    }

    /**
     * Get the geometries.
     *
     * @return Geometry[] Returns the geometries.
     */
    protected function getGeometries(): array {
        return $this->geometries;
    }

    /**
     * Set the positions.
     *
     * @param Geometry[] $geometries The geometries.
     * @return Geometry Returns this geometry.
     */
    protected function setGeometries(array $geometries): Geometry {
        $this->geometries = $geometries;
        return $this;
    }
}
