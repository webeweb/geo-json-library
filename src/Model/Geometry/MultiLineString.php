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

namespace WBW\Library\GeoJson\Model\Geometry;

use WBW\Library\GeoJson\Model\Geometry;
use WBW\Library\GeoJson\Serializer\JsonSerializer;

/**
 * Multi line string.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model\Geometry
 */
class MultiLineString extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_MULTI_LINE_STRING);
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

        /** @var LineString[] */
        return $this->getGeometries();
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeMultiLineString($this);
    }
}
