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
use WBW\Library\GeoJson\Model\Position;
use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Point.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model\Geometry
 */
class Point extends Geometry {

    /**
     * Position.
     *
     * @var Position|null
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
     * @return Position|null Returns the position.
     */
    public function getPosition(): ?Position {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializePoint($this);
    }

    /**
     * Set the position.
     *
     * @param Position|null $position The position.
     * @return Point Returns this point.
     */
    public function setPosition(?Position $position): Point {
        $this->position = $position;
        return $this;
    }
}
