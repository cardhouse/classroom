<?php  namespace Classroom\LocalClasses;

use Classroom\LocalClasses\Events\LocalClassWasAdded;
use Laracasts\Commander\Events\EventGenerator;

class LocalClass extends \Eloquent {

    use EventGenerator;

    protected $fillable = ['date'];

    protected $table = 'local_classes';

    public static function add($date, $location_id)
    {
        $localClass = new static(compact('date', 'location_id'));
        $localClass->raise(new LocalClassWasAdded($localClass));

        return $localClass;
    }


    public function location()
    {
        return $this->belongsTo('Classroom\Locations\Location');
    }

    public function enrollments()
    {
        return $this->hasMany('Classroom\Enrollment\Enrollment');
    }
    
}