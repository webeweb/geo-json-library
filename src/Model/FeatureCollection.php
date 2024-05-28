<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\GeoJson\Model;

use WBW\Library\Common\Helper\ArrayHelper;
use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Feature collection.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
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
     * @var array<string,mixed>
     */
    private $foreignMembers;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_FEATURE_COLLECTION);

        $this->setFeatures([]);
        $this->setForeignMembers([]);
    }

    /**
     * Add a feature.
     *
     * @param Feature|null $feature The feature.
     * @return FeatureCollection Returns this feature collection.
     */
    public function addFeature(?Feature $feature): FeatureCollection {
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
    public function addForeignMember(string $k, $v): FeatureCollection {
        $this->foreignMembers[$k] = $v;
        return $this;
    }

    /**
     * Get the features.
     *
     * @return Feature[] Returns the features.
     */
    public function getFeatures(): array {
        return $this->features;
    }

    /**
     * Get a foreign member.
     *
     * @param string $k The key.
     * @return mixed|null Returns the foreign member in case of success, null otherwise.
     */
    public function getForeignMember(string $k) {
        return ArrayHelper::get($this->foreignMembers, $k);
    }

    /**
     * Get the foreign members.
     *
     * @return array<string,mixed> Returns the foreign members.
     */
    public function getForeignMembers(): array {
        return $this->foreignMembers;
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeFeatureCollection($this);
    }

    /**
     * Set the features.
     *
     * @param Feature[] $features The features.
     * @return FeatureCollection Returns this feature collection.
     */
    protected function setFeatures(array $features): FeatureCollection {
        $this->features = $features;
        return $this;
    }

    /**
     * Set the foreign members.
     *
     * @param array<string,mixed> $foreignMembers The foreign members.
     * @return FeatureCollection Returns this feature collection.
     */
    protected function setForeignMembers(array $foreignMembers): FeatureCollection {
        $this->foreignMembers = $foreignMembers;
        return $this;
    }
}
