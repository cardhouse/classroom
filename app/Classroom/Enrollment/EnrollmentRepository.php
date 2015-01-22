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

    public function save(Enrollment $enrollment, $user_id, $localClass_id)
    {
        $this->userRepository->findById($user_id)->enrollments()->save($enrollment);
        return $this->localClassesRepository->findById($localClass_id)->enrollments()->save($enrollment);
    }
}