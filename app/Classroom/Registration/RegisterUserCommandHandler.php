<?php namespace Classroom\Registration;

use Laracasts\Commander\CommandHandler;
use Classroom\Users\UserRepository;
use Laracasts\Commander\Events\DispatchableTrait;
use Classroom\Users\User;
use Laracasts\Flash\Flash;

class RegisterUserCommandHandler implements CommandHandler {
    
    use DispatchableTrait;
    
    protected $repository;
    
    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function handle($command)
    {
        $user = User::register(
            $command->name, $command->email, $command->password
        );
        
        $this->repository->save($user);
        $this->dispatchEventsFor($user);
        
        Flash::overlay('User has been registered');
        
        return $user;
    }
}