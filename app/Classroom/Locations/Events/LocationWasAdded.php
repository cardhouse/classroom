<?php namespace Classroom\Locations\Events;


use Classroom\Locations\Location;

class LocationWasAdded {

    public $location;

    function __construct(Location $location)
    {
        $this->location = $location;
    }

}