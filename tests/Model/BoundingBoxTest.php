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

namespace WBW\Library\GeoJson\Tests\Model;

use JsonSerializable;
use WBW\Library\GeoJson\Model\BoundingBox;
use WBW\Library\GeoJson\Tests\AbstractTestCase;

/**
 * Bounding box test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class BoundingBoxTest extends AbstractTestCase {

    /**
     * Test addValue()
     *
     * @return void
     */
    public function testAddValue(): void {

        $obj = new BoundingBox();

        $obj->addValue(0.123456789);
        $this->assertEquals([0.123456789], $obj->getValues());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BoundingBox();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertEquals([], $obj->getValues());
    }
}
