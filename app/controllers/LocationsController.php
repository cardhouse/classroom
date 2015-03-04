<?php

use Classroom\Locations\AddLocationCommand;
use Classroom\Locations\LocationsRepository;
use Laracasts\Commander\CommandBus;


class LocationsController extends \BaseController {

	private $locationsRepository;

	function __construct(LocationsRepository $locationsRepository)
	{
		$this->beforeFilter('auth', ['except' => 'index']);
		$this->locationsRepository = $locationsRepository;
	}


	/**
	 * Display a list of the locations
	 * GET /locations
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = $this->locationsRepository->getAll();

		return View::make('locations.index', compact('locations'));
	}

	/**
	 * Show the form for adding a location.
	 * GET /locations/add
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('locations.create');
	}

	/**
	 * Store a newly created location in storage.
	 * POST /locations/add
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->execute('Classroom\Locations\AddLocationCommand');

		return Redirect::back();
	}
}