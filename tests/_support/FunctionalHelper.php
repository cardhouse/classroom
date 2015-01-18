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
        return $this->have('Classroom\Locations\Location', $overrides);

    }

    public function addALocalClass($date){
        $this->have('Classroom\LocalClasses\LocalClass', ['date' => $date]);
        $I = $this->getModule('Laravel4');

        $I->amOnPage('classes/add');
        $I->fillField('date', $date);
        $I->selectOption('location_id', '148');
        $I->click('Add Class');
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
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
