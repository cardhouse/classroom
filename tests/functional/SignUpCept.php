<?php 
$I = new FunctionalTester($scenario);
$I->am('guest');
$I->wantTo('Sign up for a class');

$I->amOnPage('/');
$I->click("Register Now");
$I->seeCurrentUrlEquals('/register');

$I->fillField("Name:","bar");
$I->fillField("Email:","bar@example.com");
$I->fillField("Password:","bar");
$I->fillField("Confirm Password:","bar");
$I->click("Sign Up");

$I->seeCurrentUrlEquals('');
$I->see("Welcome to NYSTS");

$I->seeRecord('users',[
    'name' => "bar",
    'email' => 'bar@example.com'
]);
$I->assertTrue(Auth::check());