<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Model\Geometry;

use WBW\Library\GeoJSON\Model\Geometry;
use WBW\Library\GeoJSON\Serializer\JsonSerializer;

/**
 * Multi line string.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Model\Geometry
 */
class MultiLineString extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_MULTILINESTRING);
    }

    /**
     * Add a line string.
     *
     * @param LineString|null $lineString The line string.
     * @return MultiLineString Returns this multi line string.
     */
    public function addLineString(?LineString $lineString): MultiLineString {
        return $this->addGeometry($lineString);
    }

    /**
     * Get the line strings.
     *
     * @return LineString[] Returns the line strings.
     */
    public function getLineStrings(): array {
        return $this->getGeometries();
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeMultiLineString($this);
    }
}