<?php

use Classroom\Forms\SignInForm;
use Laracasts\Flash\Flash;


class SessionsController extends \BaseController {

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        $this->signInForm = $signInForm;
    }

	/**
	 * Show the form for signing in.
	 * 
	 * GET /login
	 *
	 * @return View
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Log in a user
	 * POST /login
	 *
	 * @return Response
	 */
	public function store()
	{
		// Get the form input
		$input = Input::only(['email', 'password']);
		
		// Validate the input
		$this->signInForm->validate($input);

		// If valid, attempt to login
		if(Auth::attempt($input))
		{
		    Flash::message('Welcome Back');
		    return Redirect::intended('account');
		}
		
		// If not successful, send back with input
		Flash::error('The email address or password is incorrect');
		return Redirect::route('login_path')->withInput();
	}

	/**
	 * Log the user out.
	 * GET /logout
	 *
	 * @return Redirect
	 */
	public function destroy()
	{
		Auth::logout();
		
		Flash::message("You have been logged out");
		return Redirect::home();
	}

}