<?php namespace Classroom\Enrollment;

class EnrollStudentCommand {

    /**
     * ID of the user enrolling in the class
     *
     * @var string
     */
    public $user_id;

    /**
     * ID of the class being enrolled in
     *
     * @var string
     */
    public $localClass_id;

    /**
     * Number of students being enrolled
     *
     * @var string
     */
    public $num_students;

    public $total;

    public function __construct($user_id, $localClass_id, $num_students, $total)
    {
        $this->user_id = $user_id;
        $this->num_students = $num_students;
        $this->localClass_id = $localClass_id;
        $this->total = $total;
    }

}