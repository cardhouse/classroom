<?php namespace Classroom\Forms;


use Laracasts\Validation\FormValidator;

class EnrollmentForm extends FormValidator {

    protected $rules = [
        'user_id' => 'required|integer',
        'localClass_date' => 'required|string',
        'num_students' => 'required|integer|min:1'
    ];
}