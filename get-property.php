/**
 * Returns a property on an object including private and protected properties.
 *
 * @param $object
 * @param $property
 * @return mixed
 */
function getProperty($object, $property) {
    $properties = (array) $object;
    // Check for private property
    if (array_key_exists("\0" . get_class($object) . "\0" . $property, $properties)) {
        return $properties["\0" . get_class($object) . "\0" . $property];
    }
    // Check for protected property
    if (array_key_exists("\0*\0" . $property, $properties)) {
        return $properties["\0*\0" . $property];
    }
    // Check for public property
    if (array_key_exists($property, $properties)) {
        return $properties[$property];
    }
    return null;
}
