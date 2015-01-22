<?php

use Classroom\Forms\RegistrationForm;
use Classroom\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;

class RegistrationController extends \BaseController {

    private $registrationForm;
    
    private $commandBus;
    
    function __construct(Laracasts\Commander\CommandBus $commandBus, RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
        
        $this->beforeFilter('guest');
        
        $this->commandBus = $commandBus;
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
        
        extract(Input::only('name', 'email', 'password'));
        $command = new RegisterUserCommand($name, $email, $password);
        $user = $this->commandBus->execute($command);
        
        Auth::login($user);
        
        return Redirect::intended('/classes');
    }

}
