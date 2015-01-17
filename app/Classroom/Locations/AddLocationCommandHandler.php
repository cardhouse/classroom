<?php namespace Classroom\Locations;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Flash\Flash;

class AddLocationCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $repository;

    function __construct(LocationsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the AddLocation command
     *
     * @param $command
     * @return static
     */
    public function handle($command)
    {
        $location = Location::add($command->name, $command->address);

        $this->repository->save($location);

        $this->dispatchEventsFor($location);

        Flash::success('Location has been added.');

        return $location;
    }
}