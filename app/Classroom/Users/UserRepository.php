<?php namespace Classroom\Users;

class UserRepository {


    /**
     * Save the user instance
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Find an instance of a user
     * given an ID
     * or die trying
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }
}