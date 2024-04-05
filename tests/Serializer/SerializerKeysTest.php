<?php

declare(strict_types = 1);

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2023 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Serializer;

use WBW\Library\GeoJson\Serializer\SerializerKeys;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Serializer keys test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Serializer
 */
class SerializerKeysTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("bbox", SerializerKeys::BBOX);
        $this->assertEquals("coordinates", SerializerKeys::COORDINATES);
        $this->assertEquals("features", SerializerKeys::FEATURES);
        $this->assertEquals("geometries", SerializerKeys::GEOMETRIES);
        $this->assertEquals("geometry", SerializerKeys::GEOMETRY);
        $this->assertEquals("properties", SerializerKeys::PROPERTIES);
    }
}
