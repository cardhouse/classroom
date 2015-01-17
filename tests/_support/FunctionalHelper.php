<?php
namespace Codeception\Module;

use Illuminate\Support\Facades\Hash;
use Laracasts\TestDummy\Factory as TestDummy;


// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    public function haveAnAccount($overrides = [])
    {
        $this->have('Classroom\Users\User', $overrides);
    }

    public function addALocation($name, $address)
    {
        $I = $this->getModule('Laravel4');
        $I->fillField('Name:', $name);
        $I->fillField('Address:', $address);

        $I->click('Add Location');
        //return $this->have('Classroom\Locations\Location', $overrides);
    }

    public function have($model, $overrides = [])
    {
        TestDummy::create($model, $overrides);
    }

    public function signIn()
    {
        $email = 'foo@example.com';
        $password = 'foo';

        $this->haveAnAccount(compact('email', 'password'));
        
        $I = $this->getModule('Laravel4');
        
        $I->amOnPage('/login');
        $I->submitForm('form', [
            'email' => $email,
            'password' => $password
        ]);
    }
    
    public function amLoggedIn()
    {
        $this->signIn();
    }
}
