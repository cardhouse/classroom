<?php 
$I = new FunctionalTester($scenario);

$I->am('NYSTS member');
$I->wantTo('sign in to my account');

$I->signIn();

$I->amOnPage('/account');
$I->see('Welcome Back');
$I->assertFalse(Auth::check());