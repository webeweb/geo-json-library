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
 * Geometry collection.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model
 */
class GeometryCollection extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_GEOMETRYCOLLECTION);
    }

    /**
     * Add a geometry.
     *
     * @param Geometry $geometry The geometry.
     * @return GeometryCollection Returns this geometry collection.
     */
    public function addGeometry(Geometry $geometry) {
        return parent::addGeometry($geometry);
    }

    /**
     * {@inheritDoc}
     */
    public function getGeometries() {
        return parent::getGeometries();
    }
}