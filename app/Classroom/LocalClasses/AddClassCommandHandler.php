<?php namespace Classroom\LocalClasses;


use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Flash\Flash;

class AddClassCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $repository;

    function __construct(LocalClassesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create an instance of a local class
     * save the local class to the database
     * dispatch events, and return the local class
     *
     * @param $command
     * @return static
     */
    public function handle($command)
    {
        $date = date('Y-m-d', strtotime($command->date));
        $localClass = LocalClass::add($date, $command->location_id);

        $this->repository->save($localClass, $command->location_id);

        $this->dispatchEventsFor($localClass);

        Flash::message('Class has been added');
        return $localClass;
    }
}