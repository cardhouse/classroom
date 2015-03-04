<?php

use Classroom\Enrollment\EnrollmentRepository;
use Classroom\Enrollment\EnrollStudentCommand;
use Classroom\Forms\EnrollmentForm;
use Classroom\LocalClasses\LocalClassesRepository;
use Classroom\Promotions\PromotionsRepository;
use Laracasts\Commander\CommandBus;
use Laracasts\Flash\Flash;

class EnrollmentController extends \BaseController {

	/**
	 * @var EnrollmentForm
	 */
	private $enrollmentForm;
	/**
	 * @var EnrollmentRepository
	 */
	private $enrollmentRepository;
	/**
	 * @var LocalClassesRepository
	 */
	private $localClassesRepository;
	/**
	 * @var PromotionsRepository
	 */
	private $promoRepo;

	function __construct(PromotionsRepository $promoRepo, LocalClassesRepository $localClassesRepository, EnrollmentForm $enrollmentForm, EnrollmentRepository $enrollmentRepository)
	{
		$this->beforeFilter('auth');
		$this->enrollmentForm = $enrollmentForm;
		$this->enrollmentRepository = $enrollmentRepository;
		$this->localClassesRepository = $localClassesRepository;
		$this->promoRepo = $promoRepo;
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