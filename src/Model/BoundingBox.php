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
 * Bounding box.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model
 */
class BoundingBox {

    /**
     * Values.
     *
     * @var float[]
     */
    private $values;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setValues([]);
    }

    /**
     * Add a value.
     *
     * @param float $value The value.
     * @return BoundingBox Returns this bounding box.
     */
    public function addValue($value) {
        $this->values[] = $value;
        return $this;
    }

    /**
     * Get the values.
     *
     * @return float[] Returns the values.
     */
    public function getValues() {
        return $this->values;
    }

    /**
     * Set the values.
     *
     * @param float[] $values The values.
     * @retufn BoundingBox Returns this bounding box.
     */
    protected function setValues(array $values) {
        $this->values = $values;
        return $this;
    }

}