<?php

use Classroom\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

    private $registrationForm;
    
    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
        
        $this->beforeFilter('guest');
    }
	/**
	 * Show the form to register for a class
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

    public function store()
    {
        $this->registrationForm->validate(Input::all());

        $user = $this->execute('Classroom\Registration\RegisterUserCommand');
        
        Auth::login($user);
        
        return Redirect::intended('/classes');
    }

}
