<?php

use Classroom\Forms\AddPromoForm;

class PromotionsController extends \BaseController {

	/**
	 * @var AddPromoForm
	 */
	private $promoForm;

	function __construct(AddPromoForm $promoForm)
	{
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
		$this->promoForm->validate(Input::all());

		$this->execute('Classroom\Promotions\AddPromoCodeCommand');

		return Redirect::route('promo_path');
	}

}