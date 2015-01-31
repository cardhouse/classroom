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
	 * @var CommandBus
	 */
	private $commandBus;
	/**
	 * @var LocalClassesRepository
	 */
	private $localClassesRepository;
	/**
	 * @var PromotionsRepository
	 */
	private $promoRepo;

	function __construct(PromotionsRepository $promoRepo, LocalClassesRepository $localClassesRepository, EnrollmentForm $enrollmentForm, EnrollmentRepository $enrollmentRepository, CommandBus $commandBus)
	{
		$this->beforeFilter('auth');
		$this->enrollmentForm = $enrollmentForm;
		$this->enrollmentRepository = $enrollmentRepository;
		$this->commandBus = $commandBus;
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
		$localClass = $this->localClassesRepository->findByDate($date);

		$input = array_add(Input::get(), 'user_id', Auth::id());
		$input = array_add($input, 'localClass_id', $localClass->id);

		$this->enrollmentForm->validate($input);
		extract($input);

		$promo = $this->promoRepo->findById($promo_code);

		$total = ($localClass->price - $promo->discount) * $num_students;
		$this->commandBus->execute(new EnrollStudentCommand($user_id, $localClass_id, $num_students, $promo_code, $total));

		Flash::success('You have enrolled');

		return Redirect::route('account_path');
	}
}