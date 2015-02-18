<?php  namespace Classroom\LocalClasses;

use Classroom\LocalClasses\Events\LocalClassWasAdded;
use Laracasts\Commander\Events\EventGenerator;

class LocalClass extends \Eloquent {

    use EventGenerator;



    /**
     * The date of the class
     *
     * @var array
     */
    protected $fillable = ['date'];

    /**
     * The table the class refers to
     *
     * @var string
     */
    protected $table = 'local_classes';
    /**
     * @var
     */
    private $repo;

    /**
     * Create a static class object and raise an event
     *
     * @param $date
     * @param $location_id
     * @return static
     */
    public static function add($date, $location_id)
    {
        $localClass = new static(compact('date', 'location_id'));
        $localClass->raise(new LocalClassWasAdded($localClass));

        return $localClass;
    }

    public function totalStudents()
    {
        $repo = new LocalClassesRepository;
        return $repo->totalStudents($this);
    }

    /**
     * Location relationship
     * "This local class has a location"
     *
     * @return mixed
     */
    public function location()
    {
        return $this->belongsTo('Classroom\Locations\Location');
    }

    /**
     * Enrollments relationship
     * "A local class has many enrollments"
     *
     * @return mixed
     */
    public function enrollments()
    {
        return $this->hasMany('Classroom\Enrollment\Enrollment');
    }

    public function getDates()
    {
        return['date'];
    }
    
}