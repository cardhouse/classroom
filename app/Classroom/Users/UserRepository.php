<?php namespace Classroom\Users;

class UserRepository {
    public function save(User $user)
    {
        return $user->save();
    }
}