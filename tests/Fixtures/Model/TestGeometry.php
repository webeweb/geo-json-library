<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Fixtures\Model;

use WBW\Library\GeoJson\Model\Geometry;

/**
 * Test geometry.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Fixtures\Model
 */
class TestGeometry extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct("geometry");
    }

    /**
     * {@inheritDoc}
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
        return [];
    }
}
