<?php 
$I = new FunctionalTester($scenario);

$I->am('a classroom user');
$I->wantTo('enroll in a local class');

$I->amLoggedIn();
$I->have('Classroom\LocalClasses\LocalClass', ['date' => '2015-06-08', 'id' => 14221]);

$I->amOnRoute('enroll_path', ['date' => '2015-06-08']);
$I->enrollInAClass(3);

$I->seeInCurrentUrl('/account');
$I->see('You have enrolled');

