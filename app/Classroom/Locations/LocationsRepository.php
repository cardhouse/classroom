<?php namespace Classroom\Locations;


class LocationsRepository {

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

    public function listAll()
    {
        return Location::orderBy('id')->lists('address', 'id');
    }

}