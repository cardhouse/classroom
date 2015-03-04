<?php namespace Classroom\Locations;



class AddLocationCommand {

    public $name;

    public $address;

    function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }
}