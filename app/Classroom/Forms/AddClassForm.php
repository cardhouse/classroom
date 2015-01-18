<?php namespace Classroom\Forms;


use Laracasts\Validation\FormValidator;

class AddClassForm extends FormValidator {

    protected $rules = [
        'date' => 'required',
        'location_id' => 'required|integer',
    ];
}