<?php

class AccountsController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('auth');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return View::make('accounts.show');
	}


}
