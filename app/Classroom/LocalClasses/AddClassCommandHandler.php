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

    public function handle($command)
    {
        $localClass = LocalClass::add($command->date, $command->location_id);

        $this->repository->save($localClass, $command->location_id);

        $this->dispatchEventsFor($localClass);

        Flash::message('Class has been added');

        return $localClass;
    }
}