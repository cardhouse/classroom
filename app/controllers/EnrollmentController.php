<?php

use Classroom\Forms\EnrollmentForm;
use Classroom\LocalClasses\LocalClassesRepository;
use Laracasts\Flash\Flash;

class EnrollmentController extends \BaseController {

	/**
	 * @var EnrollmentForm
	 */
	private $enrollmentForm;
	/**
	 * @var LocalClassesRepository
	 */
	private $localClassesRepository;

	function __construct(LocalClassesRepository $localClassesRepository, EnrollmentForm $enrollmentForm)
	{
		$this->beforeFilter('auth');
		$this->localClassesRepository = $localClassesRepository;
        $this->enrollmentForm = $enrollmentForm;
    }


	/**
	 * Show the form for creating a new resource.
	 * GET /classes/{date}/enroll
	 *
	 * @return Response
	 */
	public function create($date)
	{
		$localClass = $this->localClassesRepository->findByDate($date);
		return View::make('localClasses.enrollment.create', compact('localClass'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /classes/{date}/enroll
	 *
	 * @return Response
	 */
	public function store($date)
	{
        // Add necessary input and validate
		$input = array_add(Input::all(), 'user_id', Auth::id());
		$input = array_add($input, 'localClass_date', $date);
		$this->enrollmentForm->validate($input);

        // Fire off command to enroll the student
		$this->execute('Classroom\Enrollment\EnrollStudentCommand', $input);

        // Redirect to the account page
		Flash::success('You have enrolled');
		return Redirect::route('account_path');
	}
}