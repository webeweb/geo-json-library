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

namespace WBW\Library\GeoJson\Tests\Model\Geometry;

use JsonSerializable;
use WBW\Library\GeoJson\Model\GeoJsonInterface;
use WBW\Library\GeoJson\Model\Geometry\MultiPoint;
use WBW\Library\GeoJson\Model\Geometry\Point;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Multi point test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model\Geometry
 */
class MultiPointTest extends AbstractTestCase {

    /**
     * Test addPoint()
     *
     * @return void
     */
    public function testAddPoint(): void {

        // Set a Point mock.
        $point = new Point();

        $obj = new MultiPoint();

        $obj->addPoint($point);
        $this->assertSame($point, $obj->getPoints()[0]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new MultiPoint();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals(GeoJsonInterface::TYPE_MULTI_POINT, $obj->getType());
        $this->assertEquals([], $obj->getPoints());
    }
}
