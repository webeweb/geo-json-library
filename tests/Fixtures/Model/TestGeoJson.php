<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Fixtures\Model;

use WBW\Library\GeoJson\Model\GeoJson;

/**
 * Test Geo JSON.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Fixtures\Model
 */
class TestGeoJson extends GeoJson {

    /**
     * Constructor.
     *
     * @param string $type
     */
    public function __construct(string $type) {
        parent::__construct($type);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return [];
    }
}
