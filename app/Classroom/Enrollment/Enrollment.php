<?php  namespace Classroom\Enrollment; 
use Classroom\Enrollment\Events\StudentEnrolled;
use Laracasts\Commander\Events\EventGenerator;

class Enrollment extends \Eloquent {

    use EventGenerator;

    /**
     * Values able to be mass assigned through the form
     *
     * @var array
     */
    protected $fillable = ['num_students'];

    /**
     * Create static instance of an Enrollment
     * raise an event, and return the instance
     *
     * @param $user_id
     * @param $local_class_id
     * @param $num_students
     * @return static
     */
    public static function enroll($user_id, $local_class_id, $num_students)
    {
        $enrollment = new static(compact('user_id', 'local_class_id', 'num_students'));
        $enrollment->raise(new StudentEnrolled($enrollment));

        return $enrollment;
    }

    /**
     * User relationship
     * "There is a user who is enrolled"
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Classroom\Users\User');
    }

    /**
     * Local class relationship
     * "This is an enrollment for a class"
     *
     * @return mixed
     */
    public function localClass()
    {
        return $this->belongsTo('Classroom\LocalClasses\LocalClass');
    }
    
}