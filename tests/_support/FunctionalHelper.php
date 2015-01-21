<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;


// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    public function haveAnAccount($overrides = [])
    {
        return $this->have('Classroom\Users\User', $overrides);
    }

    public function addALocation($name, $address)
    {
        $overrides = ['address' => $address];

        $I = $this->getModule('Laravel4');
        $I->submitForm('form', [
            'name' => $name,
            'address' => $address,
        ]);
    }

    public function addALocalClass($date){
        $I = $this->getModule('Laravel4');

        $I->amOnPage('classes/add');
        $I->submitForm('form', [
            'date' => $date,
            'location_id' => 420
        ]);
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

    public function signIn()
    {
        $I = $this->getModule('Laravel4');
        $email = 'foo@example.com';
        $password = 'foo';

        $this->haveAnAccount(compact('email', 'password'));

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
