<?php namespace Classroom\Enrollment;


use Classroom\LocalClasses\LocalClassesRepository;
use Classroom\Users\UserRepository;

class EnrollmentRepository {


    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var LocalClassesRepository
     */
    private $localClassesRepository;

    function __construct(UserRepository $userRepository, LocalClassesRepository $localClassesRepository)
    {
        $this->userRepository = $userRepository;
        $this->localClassesRepository = $localClassesRepository;
    }

    /**
     * Save the enrollment to a user
     *
     * @param Enrollment $enrollment
     * @param $user_id
     * @return mixed
     */
    public function saveToUser(Enrollment $enrollment, $user_id)
    {
        return $this->userRepository->findById($user_id)->enrollments()->save($enrollment);
    }

    /**
     * Save the enrollment to a class
     *
     * @param Enrollment $enrollment
     * @param $localClass_id
     * @return mixed
     */
    public function saveToClass(Enrollment $enrollment, $localClass_id)
    {
        return $this->localClassesRepository->findById($localClass_id)->enrollments()->save($enrollment);
    }
}