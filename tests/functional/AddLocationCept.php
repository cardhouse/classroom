<?php 
$I = new FunctionalTester($scenario);

$I->am('classroom admin');
$I->wantTo('add a location');

$I->amLoggedIn();
$I->amOnPage('locations/add');
$I->seeAuthentication();
$I->addALocation('Fake Address', '1234 Fake Street');

$I->amOnRoute('locations_path');
$I->see('1234 Fake Street');

