<?php

/*
 * This file is part of the geo-json-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\GeoJSON\Tests\Model;

use WBW\Library\GeoJSON\Model\BoundingBox;
use WBW\Library\GeoJSON\Model\Feature;
use WBW\Library\GeoJSON\Tests\AbstractTestCase;
use WBW\Library\GeoJSON\Tests\Fixtures\Model\TestBoundingBoxTrait;

/**
 * Bounding box trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\GeoJSON\Tests\Model
 */
class BoundingBoxTraitTest extends AbstractTestCase {

    /**
     * Tests the setBoundingBox() method.
     *
     * @return void
     */
    public function testSetBoundingBox() {

        // Set a Bounding box mock.
        $boundingBox = new BoundingBox();

        $obj = new TestBoundingBoxTrait();

        $obj->setBoundingBox($boundingBox);
        $this->assertSame($boundingBox, $obj->getBoundingBox());
    }
}