<?php

declare(strict_types = 1);

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Model;

use JsonSerializable;
use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Position.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
 */
class Position implements JsonSerializable {

    /**
     * Altitude.
     *
     * @var float|null
     */
    private $altitude;

    /**
     * Latitude.
     *
     * @var float|null
     */
    private $latitude;

    /**
     * Longitude.
     *
     * @var float|null
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
     * @return float|null Returns the altitude.
     */
    public function getAltitude(): ?float {
        return $this->altitude;
    }

    /**
     * Get the latitude.
     *
     * @return float|null Returns the latitude.
     */
    public function getLatitude(): ?float {
        return $this->latitude;
    }

    /**
     * Get the longitude.
     *
     * @return float|null Returns the longitude.
     */
    public function getLongitude(): ?float {
        return $this->longitude;
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializePosition($this);
    }

    /**
     * Set the altitude.
     *
     * @param float|null $altitude The altitude.
     * @return Position Returns this position.
     */
    public function setAltitude(?float $altitude): Position {
        $this->altitude = $altitude;
        return $this;
    }

    /**
     * Set the latitude.
     *
     * @param float|null $latitude The latitude.
     * @return Position Returns this position.
     */
    public function setLatitude(?float $latitude): Position {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Set the longitude.
     *
     * @param float|null $longitude The longitude.
     * @return Position Returns this position.
     */
    public function setLongitude(?float $longitude): Position {
        $this->longitude = $longitude;
        return $this;
    }
}
