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
 * Feature.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\GeoJSON\Model
 */
class Feature extends GeoJson {

    use BoundingBoxTrait;

    /**
     * Geometry.
     *
     * @var Geometry
     */
    private $geometry;

    /**
     * Properties.
     *
     * @var Properties
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
     * @return Geometry Returns the geometry.
     */
    public function getGeometry() {
        return $this->geometry;
    }

    /**
     * Get the properties.
     *
     * @return Properties Returns the properties.
     */
    public function getProperties() {
        return $this->properties;
    }

    /**
     * Set the geometry.
     *
     * @param Geometry|null $geometry The geometry.
     * @return Feature Returns this feature.
     */
    public function setGeometry(Geometry $geometry = null) {
        $this->geometry = $geometry;
        return $this;
    }

    /**
     * Set the properties.
     *
     * @param Properties|null $properties The properties.
     * @return Feature Returns this feature.
     */
    public function setProperties(Properties $properties = null) {
        $this->properties = $properties;
        return $this;
    }
}