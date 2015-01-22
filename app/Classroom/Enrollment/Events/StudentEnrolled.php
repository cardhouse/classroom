<?php namespace Classroom\Enrollment\Events;


use Classroom\Enrollment\Enrollment;

class StudentEnrolled {


    /**
     * @var Enrollment
     */
    private $enrollment;

    function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }
}