<?php

use Classroom\Forms\SignInForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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
	 * @return Redirect
	 */
	public function store()
	{
		$formData = Input::only(['email', 'password']);
		$this->signInForm->validate($formData);

		if(Auth::attempt($formData))
		{
		    Flash::message('Welcome Back');
		    return Redirect::intended('account');
		}

		// If not successful, send back with input
		Flash::error('The email address or password is incorrect');
		return Redirect::back()->withInput();
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