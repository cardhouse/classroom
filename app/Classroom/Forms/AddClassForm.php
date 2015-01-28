<?php namespace Classroom\Forms;


use Laracasts\Validation\FormValidator;

class AddClassForm extends FormValidator {

    protected $rules = [
        'date' => 'required|date_format:"F d, Y"|unique:local_classes',
        'location_id' => 'required|integer'
    ];
}