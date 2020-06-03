DOCUMENTATION
=============

Deserializes a Feature collection:

```php
$json = '{"type": "FeatureCollection", "features": [...]}';
$data = json_decode($json, true);

// Deserializes a feature collection. 
$result = JsonDeserializer::deserializeFeatureCollection($data);

$mainBbox = $result->getBoundingBox();
$features = $result->getFeatures();
$members  = $result->getForeignMembers();

// Handle the features.
foreach($features as $current) {

    $bbox       = $current->getBoundingBox(); 
    $geometry   = $current->getGeometry();
    $properties = $current->getProperties();
    
    // $geometry must be a Point, MultiPoint, LineString, MultiLineString, Polygon, MultiPolygon or GeometryCollection.
}
```

1° Point
---

```php
/** @var Point $geometry */
$geometry->getPosition()->getLongitude();
$geometry->getPosition()->getLatitude();
$geometry->getPosition()->getAltitude();
```

2° MultiPoint
---

```php
/** @var MultiPoint $geometry */
foreach($geometry->getPoints() as $current) {

    // same as Point.
    $current->getPosition()->getLongitude();
    $current->getPosition()->getLatitude();
    $current->getPosition()->getAltitude();
}
```

3° LineString
---

```php
/** @var LineString $geometry */
foreach($geometry->getPoints() as $current) {

    // same as Point.
    $current->getPosition()->getLongitude();
    $current->getPosition()->getLatitude();
    $current->getPosition()->getAltitude();
}
```

4° MultiLineString
---

```php
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

5° Polygon
---

```php
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

6° MultiPolygon
---

```php
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

7° GeometryCollection
---

```php
/** @var GeometryCollection $geometry */
foreach($geometry->getGeometries() as $current) {

      // $current must be a Point, MultiPoint, LineString, MultiLineString, Polygon, MultiPolygon or GeometryCollection.
}
```
