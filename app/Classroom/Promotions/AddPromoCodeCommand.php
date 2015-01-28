<?php namespace Classroom\Promotions;

class AddPromoCodeCommand {

    public $name;

    public $promo_code;

    public $discount;

    function __construct($name, $promo_code, $discount)
    {
        $this->name = $name;
        $this->promo_code = $promo_code;
        $this->discount = $discount;
    }


}