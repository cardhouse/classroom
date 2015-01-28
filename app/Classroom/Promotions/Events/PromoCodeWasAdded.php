<?php namespace Classroom\Promotions\Events;


use Classroom\Promotions\Promo;

class PromoCodeWasAdded {

    public $promo;

    function __construct(Promo $promo)
    {
        $this->promo = $promo;
    }


}