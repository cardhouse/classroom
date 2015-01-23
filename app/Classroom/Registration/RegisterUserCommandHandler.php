<?php namespace Classroom\Registration;

use Laracasts\Commander\CommandHandler;
use Classroom\Users\UserRepository;
use Laracasts\Commander\Events\DispatchableTrait;
use Classroom\Users\User;
use Laracasts\Flash\Flash;

class RegisterUserCommandHandler implements CommandHandler {
    
    use DispatchableTrait;

    /**
     * Repository to interact with the database
     *
     * @var UserRepository
     */
    protected $repository;
    
    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create an instance of the user
     * save the instance with the repository
     * dispatch events, and return the user
     *
     * @param $command
     * @return User
     */
    public function handle($command)
    {
        $user = User::register(
            $command->name, $command->email, $command->password
        );
        
        $this->repository->save($user);
        $this->dispatchEventsFor($user);
        
        Flash::success('User has been registered');
        
        return $user;
    }
}