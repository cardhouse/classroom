<?php namespace Classroom\Enrollment;

class EnrollStudentCommand {

    /**
     * ID of the user enrolling in the class
     *
     * @var string
     */
    public $user_id;

    /**
     * Number of students being enrolled
     *
     * @var string
     */
    public $num_students;

    public $localClass_date;
    public $promo_code;

    public function __construct($user_id, $localClass_date, $num_students, $promo_code)
    {
        $this->user_id = $user_id;
        $this->num_students = $num_students;
        $this->localClass_date = $localClass_date;
        $this->promo_code = $promo_code;
    }

}