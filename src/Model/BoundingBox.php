<?php

declare(strict_types = 1);

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
use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Bounding box.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model
 */
class BoundingBox implements JsonSerializable {

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
    public function addValue(float $value): BoundingBox {
        $this->values[] = $value;
        return $this;
    }

    /**
     * Get the values.
     *
     * @return float[] Returns the values.
     */
    public function getValues(): array {
        return $this->values;
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeBoundingBox($this);
    }

    /**
     * Set the values.
     *
     * @param float[] $values The values.
     * @return BoundingBox Returns this bounding box.
     */
    protected function setValues(array $values): BoundingBox {
        $this->values = $values;
        return $this;
    }
}
