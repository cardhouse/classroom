<?php namespace Classroom\Locations;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Flash\Flash;

class AddLocationCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * Repository used to store locations
     *
     * @var LocationsRepository
     */
    protected $repository;

    function __construct(LocationsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Add an instance of the location
     * save it with the repository
     * dispatch events, and return the location
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