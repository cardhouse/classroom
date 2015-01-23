<?php namespace Classroom\Locations;


class LocationsRepository {

    /**
     * Save the location to the database
     *
     * @param Location $location
     */
    public function save(Location $location)
    {
        $location->save();
    }

    /**
     * Return all of the locations
     *
     * @return mixed
     */
    public function getAll(){
        return Location::all();
    }

    /**
     * Generates an array of locations with address => id
     * Used to generate dropdown list of locations
     *
     * @return mixed
     */
    public function listAll()
    {
        return Location::orderBy('id')->lists('address', 'id');
    }

}