<?php namespace Classroom\Promotions;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Flash\Flash;

class AddPromoCodeCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $repo;

    function __construct(PromotionsRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $promo = Promo::add($command->name, $command->promo_code, $command->discount);

        $this->repo->save($promo);

        $this->dispatchEventsFor($promo);

        Flash::message('Promo has been added');
        return $promo;

    }

}