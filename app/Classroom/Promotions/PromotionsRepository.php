<?php namespace Classroom\Promotions;


class PromotionsRepository {

    public function save(Promo $promo){
        return $promo->save();
    }

    public function findById($id)
    {
        return Promo::find($id);
    }

    public function listAll()
    {
        return Promo::orderBy('promo_code')->lists('promo_code', 'id');
    }
}