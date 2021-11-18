<?php

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
use WBW\Library\Types\Helper\ArrayHelper;
use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Properties.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJson\Model
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
    public function addProperty(string $k, $v): Properties {
        $this->properties[$k] = $v;
        return $this;
    }

    /**
     * Get the properties.
     *
     * @return array Returns the properties.
     */
    public function getProperties(): array {
        return $this->properties;
    }

    /**
     * Get a property.
     *
     * @param string $k The key.
     * @return mixed|null Returns the property in case of success, null otherwise.
     */
    public function getProperty(string $k) {
        return ArrayHelper::get($this->properties, $k);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeProperties($this);
    }

    /**
     * Set the properties.
     *
     * @param array $properties The properties.
     * @return Properties Returns this properties.
     */
    protected function setProperties(array $properties): Properties {
        $this->properties = $properties;
        return $this;
    }

}