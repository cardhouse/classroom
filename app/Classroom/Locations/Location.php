<?php  namespace Classroom\Locations;

use Classroom\Locations\Events\LocationWasAdded;
use Laracasts\Commander\Events\EventGenerator;

class Location extends \Eloquent {

    use EventGenerator;

    protected $fillable = ['address', 'name'];

    /**
     * Create a static instance of a location
     * raise an event, and return the location
     *
     * @param $name
     * @param $address
     * @return static
     */
    public static function add($name, $address)
    {
        $location = new static(compact('name', 'address'));
        $location->raise(new LocationWasAdded($location));

        return $location;
    }

    /**
     * Local classes relationship
     * "This location has many local classes"
     *
     * @return mixed
     */
    public function localClasses()
    {
        return $this->hasMany('Classroom\LocalClasses\LocalClass');
    }
}