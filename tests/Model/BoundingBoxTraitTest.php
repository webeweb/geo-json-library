<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJson\Tests\Model;

use WBW\Library\GeoJson\Model\BoundingBox;
use WBW\Library\GeoJson\Tests\AbstractTestCase;
use WBW\Library\GeoJson\Tests\Fixtures\Model\TestBoundingBoxTrait;

/**
 * Bounding box trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJson\Tests\Model
 */
class BoundingBoxTraitTest extends AbstractTestCase {

    /**
     * Tests the setBoundingBox() method.
     *
     * @return void
     */
    public function testSetBoundingBox(): void {

        // Set a Bounding box mock.
        $boundingBox = new BoundingBox();

        $obj = new TestBoundingBoxTrait();

        $obj->setBoundingBox($boundingBox);
        $this->assertSame($boundingBox, $obj->getBoundingBox());
    }
}
