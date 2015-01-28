<?php namespace Classroom\Forms;


use Laracasts\Validation\FormValidator;

class AddPromoForm extends FormValidator {

    protected $rules = [
        'name' => 'required',
        'promo_code' => 'required|unique:promo_codes',
        'discount' => 'required|integer'
    ];
}