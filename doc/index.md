DOCUMENTATION
=============

Deserializes a Feature collection:

```php
use WBW\Library\GeoJson\Model\BoundingBox;
use WBW\Library\GeoJson\Model\Feature;
use WBW\Library\GeoJson\Model\FeatureCollection;
use WBW\Library\GeoJson\Model\Geometry;
use WBW\Library\GeoJson\Model\Properties;
use WBW\Library\GeoJson\Serializer\JsonDeserializer;

$json = '{"type": "FeatureCollection", "features": [...]}';
$data = json_decode($json, true);

// Deserializes a feature collection. 
$result = JsonDeserializer::deserializeFeatureCollection($data);

$mainBbox = $result->getBoundingBox(); /** @var BoundingBox $mainBbox */
$features = $result->getFeatures(); /** @var Feature[] $features */
$members  = $result->getForeignMembers(); /** @var mixed[] $members */

// Handle the features.
/** @var Feature $current */
foreach($features as $current) {

    $bbox       = $current->getBoundingBox(); /** @var BoundingBox $bbox */ 
    $geometry   = $current->getGeometry(); /** @var Geometry $geometry */
    $properties = $current->getProperties(); /** @var Properties $properties */
    
    // $geometry must be a Point, MultiPoint, LineString, MultiLineString, Polygon, MultiPolygon or GeometryCollection.
}
```

1) Point

```php
use WBW\Library\GeoJson\Model\Geometry\Point;

/** @var Point $geometry */
$geometry->getPosition()->getLongitude();
$geometry->getPosition()->getLatitude();
$geometry->getPosition()->getAltitude();
```

2) MultiPoint

```php
use WBW\Library\GeoJson\Model\Geometry\MultiPoint;

/** @var MultiPoint $geometry */
foreach($geometry->getPoints() as $current) {

    // same as Point.
    $current->getPosition()->getLongitude();
    $current->getPosition()->getLatitude();
    $current->getPosition()->getAltitude();
}
```

3) LineString

```php
use WBW\Library\GeoJson\Model\Geometry\LineString;

/** @var LineString $geometry */
foreach($geometry->getPoints() as $current) {

    // same as Point.
    $current->getPosition()->getLongitude();
    $current->getPosition()->getLatitude();
    $current->getPosition()->getAltitude();
}
```

4) MultiLineString

```php
use WBW\Library\GeoJson\Model\Geometry\MultiLineString;

/** @var MultiLineString $geometry */
foreach($geometry->getLineStrings() as $current) {

    // same as LineString
    foreach($current->getPoints() as $point) {

        $point->getPosition()->getLongitude();
        $point->getPosition()->getLatitude();
        $point->getPosition()->getAltitude();
    }
}
```

5) Polygon

```php
use WBW\Library\GeoJson\Model\Geometry\Polygon;

/** @var Polygon $geometry */
foreach($geometry->getExteriorRings() as $current) {

    // same as Point.
    $current->getPosition()->getLongitude();
    $current->getPosition()->getLatitude();
    $current->getPosition()->getAltitude();
}

foreach($geometry->getInteriorRings() as $current) {

    // same as Point.
    $current->getPosition()->getLongitude();
    $current->getPosition()->getLatitude();
    $current->getPosition()->getAltitude();
}
```

6) MultiPolygon

```php
use WBW\Library\GeoJson\Model\Geometry\MultiPolygon;

/** @var MultiPolygon $geometry */
foreach($geometry->getPolygons() as $current) {

    // same as Polygon
    foreach($current->getExteriorRings() as $point) {
        // ...    
    }

    foreach($current->getInteriorRings() as $point) {
        // ...    
    }
}
```

7) GeometryCollection

```php
use WBW\Library\GeoJson\Model\GeometryCollection;

/** @var GeometryCollection $geometry */
foreach($geometry->getGeometries() as $current) {

      // $current must be a Point, MultiPoint, LineString, MultiLineString, Polygon, MultiPolygon or GeometryCollection.
}
```
