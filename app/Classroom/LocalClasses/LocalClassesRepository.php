<?php namespace Classroom\LocalClasses;


use Classroom\Locations\Location;

class LocalClassesRepository {

    public function save(LocalClass $localClass, $location_id)
    {
        return Location::findOrFail($location_id)->localClasses()->save($localClass);
    }

    /**
     * Return all of the classes
     *
     * @return mixed
     */
    public function getAll()
    {
        return LocalClass::all();
    }

}