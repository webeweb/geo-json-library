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
 * Multi point.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Model\Geometry
 */
class MultiPoint extends Geometry {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_MULTI_POINT);
    }

    /**
     * Add a point.
     *
     * @param Point|null $point The point.
     * @return MultiPoint Returns this multi point.
     */
    public function addPoint(?Point $point): MultiPoint {
        return $this->addGeometry($point);
    }

    /**
     * Get the points.
     *
     * @return Point[] Returns the points.
     */
    public function getPoints(): array {

        /** @var Point[] */
        return $this->getGeometries();
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeMultiPoint($this);
    }
}
