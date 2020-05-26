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
 * Bounding box trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model
 */
trait BoundingBoxTrait {

    /**
     * Bounding box.
     *
     * @var BoundingBox
     */
    private $boundingBox;

    /**
     * Get the bounding box.
     *
     * @return BoundingBox Returns the bounding box.
     */
    public function getBoundingBox() {
        return $this->boundingBox;
    }

    /**
     * Set the bounding box.
     *
     * @param BoundingBox|null $boundingBox The bounding box.
     */
    public function setBoundingBox(BoundingBox $boundingBox = null) {
        $this->boundingBox = $boundingBox;
        return $this;
    }
}