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

use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Feature.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
 */
class Feature extends GeoJson {

    use BoundingBoxTrait;

    /**
     * Geometry.
     *
     * @var Geometry|null
     */
    private $geometry;

    /**
     * Properties.
     *
     * @var Properties|null
     */
    private $properties;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_FEATURE);
    }

    /**
     * Get the geometry.
     *
     * @return Geometry|null Returns the geometry.
     */
    public function getGeometry(): ?Geometry {
        return $this->geometry;
    }

    /**
     * Get the properties.
     *
     * @return Properties|null Returns the properties.
     */
    public function getProperties(): ?Properties {
        return $this->properties;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeFeature($this);
    }

    /**
     * Set the geometry.
     *
     * @param Geometry|null $geometry The geometry.
     * @return Feature Returns this feature.
     */
    public function setGeometry(?Geometry $geometry): Feature {
        $this->geometry = $geometry;
        return $this;
    }

    /**
     * Set the properties.
     *
     * @param Properties|null $properties The properties.
     * @return Feature Returns this feature.
     */
    public function setProperties(?Properties $properties): Feature {
        $this->properties = $properties;
        return $this;
    }
}
