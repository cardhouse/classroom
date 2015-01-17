<?php namespace Classroom\Locations;


class LocationsRepository {

    public function save(Location $location)
    {
        $location->save();
    }

    public function getAll(){
        return Location::all();
    }

}