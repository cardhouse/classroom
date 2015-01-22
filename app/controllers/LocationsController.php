<?php

use Classroom\Locations\AddLocationCommand;
use Classroom\Locations\LocationsRepository;
use Laracasts\Commander\CommandBus;


class LocationsController extends \BaseController {

	private $commandBus;

	private $locationsRepository;

	function __construct(CommandBus $commandBus, LocationsRepository $locationsRepository)
	{
		$this->beforeFilter('auth', ['except' => 'index']);
		$this->commandBus = $commandBus;
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
		$this->commandBus->execute(new AddLocationCommand(Input::all()));
		return Redirect::back();
	}


}