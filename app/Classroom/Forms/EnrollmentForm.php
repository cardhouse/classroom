<?php namespace Classroom\Forms;


use Laracasts\Validation\FormValidator;

class EnrollmentForm extends FormValidator {

    protected $rules = [
        'user_id' => 'required|integer',
        'localClass_id' => 'required|integer',
        'num_students' => 'required|integer|min:1'
    ];
}