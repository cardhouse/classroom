<?php 
$I = new FunctionalTester($scenario);

$I->am('a classroom admin');
$I->wantTo('add a local class');

$I->amLoggedIn();

$I->have('Classroom\Locations\Location', [
    'id' => 420,
    'address' => '1234 Fake Street',
]);
$I->addALocalClass('April 20, 2015');
$I->amOnPage('/classes');
$I->see('April 20, 2015');
$I->see('1234 Fake Street');

