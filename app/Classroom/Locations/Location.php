<?php  namespace Classroom\Locations;

use Classroom\Locations\Events\LocationWasAdded;
use Laracasts\Commander\Events\EventGenerator;

class Location extends \Eloquent {

    use EventGenerator;

    protected $fillable = ['address', 'name'];

    public static function add($name, $address)
    {
        $location = new static(compact('name', 'address'));
        $location->raise(new LocationWasAdded($location));

        return $location;
    }
}