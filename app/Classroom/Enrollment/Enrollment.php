<?php  namespace Classroom\Enrollment; 
use Classroom\Enrollment\Events\StudentEnrolled;
use Laracasts\Commander\Events\EventGenerator;

class Enrollment extends \Eloquent {

    use EventGenerator;

    protected $fillable = ['user_id', 'local_class_id', 'num_students'];

    public static function enroll($user_id, $local_class_id, $num_students)
    {
        $enrollment = new static(compact('user_id', 'local_class_id', 'num_students'));
        $enrollment->raise(new StudentEnrolled($enrollment));

        return $enrollment;
    }

    public function user()
    {
        return $this->belongsTo('Classroom\Users\User');
    }

    public function localClass()
    {
        return $this->belongsTo('Classroom\LocalClasses\LocalClass');
    }
    
}