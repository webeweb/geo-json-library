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
use WBW\Library\GeoJSON\Model\Position;

/**
 * Point.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model\Geometry
 */
class Point extends Geometry {

    /**
     * Position.
     *
     * @var Position
     */
    private $position;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_POINT);
    }

    /**
     * Get the position.
     *
     * @return Position Returns the position.
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set the position.
     *
     * @param Position|null $position The position.
     * @return Point Returns this point.
     */
    public function setPosition(Position $position = null) {
        $this->position = $position;
        return $this;
    }
}