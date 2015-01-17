<?php namespace Classroom\Users;

use Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;

use Classroom\Registration\Events\UserRegistered;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Hash the given password and set the user's attribute
	 * 
	 * @param password
	 */
	public function setPasswordAttribute ($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
	
	
    /**
     * Register a user
     * 
     * @param name
     * @param email 
     * @param password
     * 
     * @return user
     */
    public static function register($name, $email, $password)
    {
        $user = new static(compact('name', 'email', 'password'));
        
        $user->raise(new UserRegistered($user));
        
        return $user;
    }
}
