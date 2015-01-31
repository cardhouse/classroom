<?php namespace Classroom\Enrollment;


use Classroom\LocalClasses\LocalClassesRepository;
use Classroom\Promotions\Promo;
use Classroom\Promotions\PromotionsRepository;
use Classroom\Users\User;
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
    /**
     * @var PromotionsRepository
     */
    private $promotionsRepository;

    function __construct(UserRepository $userRepository, LocalClassesRepository $localClassesRepository, PromotionsRepository $promotionsRepository)
    {
        $this->userRepository = $userRepository;
        $this->localClassesRepository = $localClassesRepository;
        $this->promotionsRepository = $promotionsRepository;
    }

    public function getAllForUser(User $user)
    {
        return $user->enrollments()->latest()->get();
    }

    public function save(Enrollment $enrollment)
    {
        return $enrollment->save();
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

    public function attachPromo(Enrollment $enrollment, Promo $promo)
    {

        return $enrollment->promo()->save($promo);
    }
}