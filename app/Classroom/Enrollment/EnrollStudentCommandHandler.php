<?php namespace Classroom\Enrollment;

use Classroom\LocalClasses\LocalClass;
use Classroom\Promotions\Promo;
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
     * Create an instance of an enrollment
     * save the instance to a user and a local class
     * dispatch events, and return the enrollment
     *
     * @param object $command
     * @return object $enrollment
     */
    public function handle($command)
    {
        $enrollment = Enrollment::enroll($command->user_id, $command->num_students);
        $enrollment->total = $command->total;
        $promo = Promo::find($command->promo_code);
        $this->repository->saveToUser($enrollment, $command->user_id);
        $this->repository->saveToClass($enrollment, $command->localClass_id);
        $this->repository->attachPromo($enrollment, $promo);
        $this->repository->save($enrollment);

        $this->dispatchEventsFor($enrollment);

        Flash::success('You have enrolled');
        return $enrollment;
    }

}