<?php namespace Classroom\LocalClasses;


use Classroom\Locations\Location;

class LocalClassesRepository {

    /**
     * Save the local class to a location
     *
     * @param LocalClass $localClass
     * @param $location_id
     * @return mixed
     */
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

    /**
     * Find an instance of a local class
     * given a date string (format "yyyy-mm-dd")
     * or fail trying
     *
     * @param $date
     * @return mixed
     */
    public function findByDate($date)
    {
        return LocalClass::where('date', '=', $date)->firstOrFail();
    }

    /**
     * Find an instance of a local class given an ID
     * or fail trying
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return LocalClass::findOrFail($id);
    }

}