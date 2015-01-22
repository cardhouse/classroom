<?php namespace Classroom\Users;

class UserRepository {
    public function save(User $user)
    {
        return $user->save();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }
}