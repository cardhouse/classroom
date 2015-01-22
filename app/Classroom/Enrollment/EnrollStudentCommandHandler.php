<?php namespace Classroom\Enrollment;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Flash\Flash;

class EnrollStudentCommandHandler implements CommandHandler {

    use DispatchableTrait;

    private $repository;

    function __construct(EnrollmentRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return object $enrollment
     */
    public function handle($command)
    {
        $enrollment = Enrollment::enroll($command->user_id, $command->localClass_id, $command->num_students);

        $this->repository->save($enrollment, $command->user_id, $command->localClass_id, $command->num_students);

        $this->dispatchEventsFor($enrollment);

        Flash::success('You have enrolled');

        return $enrollment;
    }

}