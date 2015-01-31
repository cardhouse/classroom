<?php

use Classroom\Forms\AddPromoForm;
use Classroom\Promotions\AddPromoCodeCommand;
use Classroom\Promotions\Promo;
use Laracasts\Commander\CommandBus;

class PromotionsController extends \BaseController {

	private $commandBus;
	/**
	 * @var AddPromoForm
	 */
	private $promoForm;

	function __construct(CommandBus $commandBus, AddPromoForm $promoForm)
	{
		$this->commandBus = $commandBus;
		$this->promoForm = $promoForm;
	}


	/**
	 * Display a listing of the resource.
	 * GET /promo
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('promotions.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /promo/add
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('promotions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /promo/add
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		$this->promoForm->validate($input);
		extract($input);
		$this->commandBus->execute(new AddPromoCodeCommand($name, $promo_code, $discount));

		return Redirect::route('promo_path');

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /promotions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /promotions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /promotions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}