<?php namespace Classroom\LocalClasses;


class AddClassCommand {

    public $date;

    public $location_id;

    function __construct($date, $location_id)
    {
        $this->date = $date;
        $this->location_id = $location_id;
    }


}