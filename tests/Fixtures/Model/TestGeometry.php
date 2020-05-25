<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Fixtures\Model;

use WBW\Library\GeoJSON\Model\Geometry;

/**
 * Test geometry.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Fixtures\Model
 */
class TestGeometry extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct("geometry");
    }
}