<?php namespace Classroom\Locations;



class AddLocationCommand {

    public $name;

    public $address;

    function __construct($location)
    {
        $this->name = $location['name'];
        $this->address = $location['address'];
    }
}