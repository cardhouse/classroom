<?php

use Classroom\Forms\RegistrationForm;
use Classroom\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;
use Laracasts\Commander\CommanderTrait;

class RegistrationController extends \BaseController {

    use CommanderTrait;

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

        $user = $this->execute('Classroom\Registration\RegisterUserCommand');
        
        Auth::login($user);
        
        return Redirect::intended('/classes');
    }

}
