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

use WBW\Library\Core\Argument\Helper\ArrayHelper;
use WBW\Library\GeoJSON\Serializer\JsonSerializer;

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
     * Foreign members.
     *
     * @var array
     */
    private $foreignMembers;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_FEATURECOLLECTION);
        $this->setFeatures([]);
        $this->setForeignMembers([]);
    }

    /**
     * Add a feature.
     *
     * @param Feature|null $feature The feature.
     * @return FeatureCollection Returns this feature collection.
     */
    public function addFeature(Feature $feature = null) {
        if (null !== $feature) {
            $this->features[] = $feature;
        }
        return $this;
    }

    /**
     * Add a foreign members.
     *
     * @param string $k The key.
     * @param mixed $v The value.
     * @return FeatureCollection Returns this feature collection.
     */
    public function addForeignMember($k, $v) {
        $this->foreignMembers[$k] = $v;
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
     * Get a foreign member.
     *
     * @param string $k The key.
     * @return mixed|null Returns the foreign member in case of success, null otherwise.
     */
    public function getForeignMember($k) {
        return ArrayHelper::get($this->foreignMembers, $k);
    }

    /**
     * Get the foreign members.
     *
     * @return array Returns the foreign members.
     */
    public function getForeignMembers() {
        return $this->foreignMembers;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return JsonSerializer::serializeFeatureCollection($this);
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

    /**
     * Set the foreign members.
     *
     * @param array $foreignMembers The foreign members.
     * @return FeatureCollection Returns this feature collection.
     */
    protected function setForeignMembers(array $foreignMembers) {
        $this->foreignMembers = $foreignMembers;
        return $this;
    }
}