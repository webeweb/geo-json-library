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

use JsonSerializable;
use WBW\Library\GeoJSON\Serializer\JsonSerializer;

/**
 * Position.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model
 */
class Position implements JsonSerializable {

    /**
     * Altitude.
     *
     * @var float
     */
    private $altitude;

    /**
     * Latitude.
     *
     * @var float
     */
    private $latitude;

    /**
     * Longitude.
     *
     * @var float
     */
    private $longitude;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the altitude.
     *
     * @return float Returns the altitude.
     */
    public function getAltitude() {
        return $this->altitude;
    }

    /**
     * Get the latitude.
     *
     * @return float Returns the latitude.
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * Get the longitude.
     *
     * @return float Returns the longitude.
     */
    public function getLongitude() {
        return $this->longitude;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializePosition($this);
    }

    /**
     * Set the altitude.
     *
     * @param float $altitude The altitude.
     * @return Position Returns this position.
     */
    public function setAltitude($altitude) {
        $this->altitude = $altitude;
        return $this;
    }

    /**
     * Set the latitude.
     *
     * @param float $latitude The latitude.
     * @return Position Returns this position.
     */
    public function setLatitude($latitude) {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Set the longitude.
     *
     * @param float $longitude The longitude.
     * @return Position Returns this position.
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
        return $this;
    }
}