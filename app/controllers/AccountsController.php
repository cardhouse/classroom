<?php

use Classroom\Enrollment\EnrollmentRepository;

class AccountsController extends \BaseController {

	/**
	 * @var EnrollmentRepository
	 */
	private $enrollmentRepository;

	function __construct(EnrollmentRepository $enrollmentRepository)
	{
		$this->beforeFilter('auth');
		$this->enrollmentRepository = $enrollmentRepository;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$enrollments = $this->enrollmentRepository->getAllForUser(Auth::user());

		return View::make('accounts.show', compact('enrollments'));
	}


}
