<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform click on button to see hallo Welt..');
$I->amOnPage('/login');
$I->fillField('Username:','admin');
$I->fillField('Password:','kitten');
$I->click('login');
$I->see('Der Weg zur Hochblasse');
?>
