<?php namespace Classroom\Registration;

/**
 * Create an instance of a user
 * The Handler will take it from here
 *
 * Class RegisterUserCommand
 * @package Classroom\Registration
 */
class RegisterUserCommand {
    
    public $name;
    public $email;
    public $password;
    
    function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}