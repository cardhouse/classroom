<?php

use Carbon\Carbon;
use Classroom\Forms\AddClassForm;
use Classroom\LocalClasses\AddClassCommand;
use Classroom\LocalClasses\LocalClassesRepository;
use Classroom\Locations\LocationsRepository;
use Laracasts\Commander\CommandBus;

class LocalClassesController extends \BaseController {

	private $commandBus;

	private $localClassesRepository;
	/**
	 * @var AddClassForm
	 */
	private $addClassForm;
	/**
	 * @var LocationsRepository
	 */
	private $locationsRepository;

	function __construct(LocationsRepository $locationsRepository, AddClassForm $addClassForm,CommandBus $commandBus,LocalClassesRepository $localClassesRepository)
	{
		$this->beforeFilter('auth', ['except' => ['index', 'show']]);
		$this->commandBus = $commandBus;
		$this->addClassForm = $addClassForm;
		$this->localClassesRepository = $localClassesRepository;
		$this->locationsRepository = $locationsRepository;
	}


	/**
	 * Display a list of local classes.
	 * GET /classes
	 *
	 * @return Response
	 */
	public function index()
	{
		$classes = $this->localClassesRepository->getAll();
		return View::make('localClasses.index', compact('classes'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /classes/add
	 *
	 * @return Response
	 */
	public function create()
	{
		$locations = $this->locationsRepository->listAll();
		return View::make('localClasses.create')->with(compact('locations'));
	}

	/**
	 * Save a new class date
	 * POST /classes/add
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->addClassForm->validate(Input::all());
		extract(Input::all());
		// Change string date field into a dateTime
		$date = date('Y-m-d', strtotime($date));
		$this->commandBus->execute(new AddClassCommand($date, $location_id));

		return Redirect::route('local_classes_path');
	}

	/**
	 * Display the specified resource.
	 * GET /localclasses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($date)
	{
		$date = new Carbon($date, 'America/New_York');

		$localClass = $this->localClassesRepository->findByDate($date);
		return View::make('localClasses.show', compact('localClass', 'date'));
	}

	public function info($date)
	{
		$localClass = $this->localClassesRepository->findByDate($date);
		$total_students = $this->localClassesRepository->totalStudents($localClass);
		$registrations = $localClass->enrollments;

		return View::make('localClasses.info', compact('localClass', 'registrations', 'total_students'));
	}



}