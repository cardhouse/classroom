<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;


// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    public function haveAnAccount($overrides = [])
    {
        $user = TestDummy::create('Classroom\Users\User', $overrides);
    }
    
    public function signIn()
    {
        $this->haveAnAccount(['email' => 'foo@example.com', 'password' => 'foo']);
        
        $I = $this->getModule('Laravel4');
        
        $I->amOnPage('/login');
        $I->fillField('email', 'foo@example.com');
        $I->fillField('password', 'foo');
        $I->click('Sign In');
    }
    
    public function amLoggedIn()
    {
        $this->signIn();
    }
}
