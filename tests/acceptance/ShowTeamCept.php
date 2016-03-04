<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('make sure team page is up and runnig');
$I->amOnPage('/team');
$I->see('La vida se ta va!');
