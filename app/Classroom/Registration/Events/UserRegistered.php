<?php namespace Classroom\Registration\Events;

use Classroom\Users\User;

class UserRegistered {
    
    public $user;
    
    function __construct(User $user)
    {
        $this->user = $user;
    }
    
}