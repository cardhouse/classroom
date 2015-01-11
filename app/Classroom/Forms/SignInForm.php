<?php namespace Classroom\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {
    
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
}