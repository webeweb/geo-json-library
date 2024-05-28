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

/**
 * Bounding box trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
 */
trait BoundingBoxTrait {

    /**
     * Bounding box.
     *
     * @var BoundingBox|null
     */
    private $boundingBox;

    /**
     * Get the bounding box.
     *
     * @return BoundingBox|null Returns the bounding box.
     */
    public function getBoundingBox(): ?BoundingBox {
        return $this->boundingBox;
    }

    /**
     * Set the bounding box.
     *
     * @param BoundingBox|null $boundingBox The bounding box.
     * @return self Returns this instance.
     */
    public function setBoundingBox(?BoundingBox $boundingBox): self {
        $this->boundingBox = $boundingBox;
        return $this;
    }
}
