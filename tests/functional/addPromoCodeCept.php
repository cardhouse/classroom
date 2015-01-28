<?php 
$I = new FunctionalTester($scenario);

$I->am('an NYSTS admin');
$I->wantTo('add a new promo code');

$I->amOnRoute('add_promo_path');
$I->submitForm('form',[
    'name' => 'Test Promo',
    'promo_code' => 'TEST05',
    'discount' => 5
]);

$I->see('Promo has been added');
$I->seeRecord('promo_codes', [
    'name' => 'Test Promo',
    'promo_code' => 'TEST05',
    'discount' => 5
]);
