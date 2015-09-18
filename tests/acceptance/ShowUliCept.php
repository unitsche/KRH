<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('make sure uli page is up and runnig');
$I->amOnPage('/ulis-page');
$I->see('Der Weg zur Hochblasse');
