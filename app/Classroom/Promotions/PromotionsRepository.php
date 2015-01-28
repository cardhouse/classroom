<?php namespace Classroom\Promotions;


class PromotionsRepository {

    public function save(Promo $promo){
        return $promo->save();
    }
}