<?php

class ExampleTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testUserNameCanBeChanged()
    {

      $date_1 = new DateTime('2000-01-01');
      $date_2 = new DateTime('2011-01-01');

    // create a user from framework, user will be deleted after the test
    $user = $this->tester->haveInRepository('unBundle\Entity\Users',
      ['displayname' => 'Miles', 
       'username' => 'miles',
       'email' => 'u.nitsche@gmail.com',
       'algorithm' => 1,
       'password' => 'Uasdfasdfasdfw23',
       'salt' => 'asdfsadf234',
       'avatar' => 1,
       'verified'=> 1,
       'created' => $date_1,
       'updated' => $date_2,
       'roles'=> 1]);
    // get entity manager by accessing module
    $em = $this->getModule('Doctrine2')->em;
    // get real user
    $user = $em->find('unBundle\Entity\Users', $user);
    $user->setUsername('bill');
    $user->setDisplayName('Haha');
    $em->persist($user);
    $em->flush();
    $this->assertEquals('bill', $user->getUserName());
    // verify data was saved using framework methods
    $this->tester->seeInRepository('unBundle\Entity\Users', ['username' => 'bill']);
    $this->tester->dontSeeInRepository('unBundle\Entity\Users', ['username' => 'miles']);
    }
}
