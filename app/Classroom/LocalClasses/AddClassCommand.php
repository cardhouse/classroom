<?php namespace Classroom\LocalClasses;


/**
 * Generally just creates a Local Class object
 * The LocalClassHandler takes it from there.
 *
 * Class AddClassCommand
 * @package Classroom\LocalClasses
 */
class AddClassCommand {

    /**
     * Date of the class
     *
     * @var
     */
    public $date;

    /**
     * Location of the class
     *
     * @var
     */
    public $location_id;


    function __construct($date, $location_id)
    {
        $this->date = $date;
        $this->location_id = $location_id;
    }


}