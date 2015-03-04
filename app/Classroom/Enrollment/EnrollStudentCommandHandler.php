<?php namespace Classroom\Enrollment;

use Classroom\LocalClasses\LocalClass;
use Classroom\LocalClasses\LocalClassesRepository;
use Classroom\Promotions\Promo;
use Classroom\Promotions\PromotionsRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Flash\Flash;

class EnrollStudentCommandHandler implements CommandHandler {

    use DispatchableTrait;

    private $enrollmentRepository;
    /**
     * @var LocalClassesRepository
     */
    private $localClassesRepository;
    /**
     * @var PromotionsRepository
     */
    private $promoRepository;

    function __construct(EnrollmentRepository $enrollmentRepository, LocalClassesRepository $localClassesRepository,
                         PromotionsRepository $promoRepository)
    {
        $this->enrollmentRepository = $enrollmentRepository;
        $this->localClassesRepository = $localClassesRepository;
        $this->promoRepository = $promoRepository;
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
        // Find the promo and the class being registered

        $promo = $this->promoRepository->findById($command->promo_code);
        $localClass = $this->localClassesRepository->findByDate($command->localClass_date);

        // Create an enrollment
        $enrollment = Enrollment::enroll($command->user_id, $command->num_students);

        // Set the total
        $enrollment->total = ($localClass->price - $promo->discount) * $command->num_students;

        // Make the proper relationship connections
        $this->enrollmentRepository->saveToUser($enrollment, $command->user_id);
        $this->enrollmentRepository->saveToClass($enrollment, $localClass->id);
        $this->enrollmentRepository->save($enrollment);

        // Save the enrollment
        $promo->enrollments()->save($enrollment);

        // Dispatch the events
        $this->dispatchEventsFor($enrollment);

        return $enrollment;
    }

}