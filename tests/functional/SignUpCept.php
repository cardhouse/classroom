<?php 
$I = new FunctionalTester($scenario);
$I->am('guest');
$I->wantTo('register for an account');

$I->amOnPage('/');
$I->click("Register");
$I->seeCurrentUrlEquals('/register');

$I->fillField("Name:","bar");
$I->fillField("Email:","bar@example.com");
$I->fillField("Password:","bar");
$I->fillField("Confirm Password:","bar");
$I->click("Sign Up");

$I->seeRecord('users',[
    'name' => "bar",
    'email' => 'bar@example.com'
]);
$I->assertTrue(Auth::check());