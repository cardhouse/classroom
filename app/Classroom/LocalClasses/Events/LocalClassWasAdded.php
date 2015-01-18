<?php namespace Classroom\LocalClasses\Events;


use Classroom\LocalClasses\LocalClass;

class LocalClassWasAdded {

    public $localClass;

    function __construct(LocalClass $localClass)
    {
        $this->localClass = $localClass;
    }


}