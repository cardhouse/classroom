<?php  namespace Classroom\Promotions; 

use Classroom\Promotions\Events\PromoCodeWasAdded;
use Laracasts\Commander\Events\EventGenerator;

class Promo extends \Eloquent {

    use EventGenerator;

    protected $fillable = ['name', 'promo_code', 'discount'];

    protected $table = 'promo_codes';

    public static function add($name, $promo_code, $discount)
    {
        $promo = new static(compact('name','promo_code','discount'));
        $promo->raise(new PromoCodeWasAdded($promo));

        return $promo;
    }
    
}