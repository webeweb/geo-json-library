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
 * Properties.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Model
 */
class Properties implements JsonSerializable {

    /**
     * Properties.
     *
     * @var array
     */
    private $properties;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setProperties([]);
    }

    /**
     * Add a property.
     *
     * @param string $k The key.
     * @param mixed $v The value.
     * @return Properties Returns this properties.
     */
    public function addProperty($k, $v) {
        $this->properties[$k] = $v;
        return $this;
    }

    /**
     * Get the properties.
     *
     * @return array Returns the properties.
     */
    public function getProperties() {
        return $this->properties;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeProperties($this);
    }

    /**
     * Set the properties.
     *
     * @param array $properties The properties.
     * @return Properties Returns this properties.
     */
    protected function setProperties(array $properties) {
        $this->properties = $properties;
        return $this;
    }

}