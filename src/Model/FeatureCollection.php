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
 * Feature collection.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model
 */
class FeatureCollection extends GeoJson {

    use BoundingBoxTrait;

    /**
     * Features.
     *
     * @var Feature[]
     */
    private $features;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_FEATURECOLLECTION);
        $this->setFeatures([]);
    }

    /**
     * Add a feature.
     *
     * @param Feature $feature The feature.
     * @return FeatureCollection Returns this feature collection.
     */
    public function addFeature(Feature $feature) {
        $this->features[] = $feature;
        return $this;
    }

    /**
     * Get the features.
     *
     * @return Feature[] Returns the features.
     */
    public function getFeatures() {
        return $this->features;
    }

    /**
     * Set the features.
     *
     * @param Feature[] $features The features.
     * @return FeatureCollection Returns this feature collection.
     */
    protected function setFeatures(array $features) {
        $this->features = $features;
        return $this;
    }
}