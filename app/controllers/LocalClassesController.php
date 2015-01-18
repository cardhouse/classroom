<?php

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
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /localclasses/{id}/edit
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
	 * PUT /localclasses/{id}
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
	 * DELETE /localclasses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}