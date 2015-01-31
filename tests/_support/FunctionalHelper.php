<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;


// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    /**
     * Universal dummy maker to set an item
     *
     * @param $model
     * @param array $overrides - optional
     * @return mixed
     */
    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

    /**
     * Helper class to return an account
     *
     * @param array $overrides
     * @return mixed
     */
    public function haveAnAccount($overrides = [])
    {
        return $this->have('Classroom\Users\User', $overrides);
    }

    public function enrollInAClass($num_students)
    {
        $promo = $this->have('Classroom\Promotions\Promo');
        $I = $this->getModule('Laravel4');
        $I->submitForm('form', [
            'num_students' => $num_students,
            'promo_code' => $promo->id
        ]);
    }

    /**
     * Add a location
     *
     * @param $name
     * @param $address
     * @throws \Codeception\Exception\Module
     */
    public function addALocation($name, $address)
    {
        $I = $this->getModule('Laravel4');
        $I->submitForm('form', [
            'name' => $name,
            'address' => $address,
        ]);
    }

    /**
     * Add an instance of a local class
     *
     * @param $date
     * @throws \Codeception\Exception\Module
     */
    public function addALocalClass($date){
        $I = $this->getModule('Laravel4');

        $I->amOnPage('classes/add');
        $I->submitForm('form', [
            'date' => $date,
            'location_id' => 420
        ]);
    }

    /**
     * Sign in with a user
     *
     * @throws \Codeception\Exception\Module
     */
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

    /**
     * Easy way to sign in a user
     */
    public function amLoggedIn()
    {
        $this->signIn();
    }
}
