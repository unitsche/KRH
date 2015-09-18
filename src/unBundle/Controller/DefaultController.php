<?php

namespace unBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use unBundle\Entity\Vocabulary;

class DefaultController extends Controller
{

    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        return new Response('Admin page!');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/ulis-page", name="ulispage")
     */
    public function uliAction($name = Null)
    {
      return $this->render('uli.html.twig');
    }

    /**
     * @Route("/Seitenlinien-I", name="seitenlinien-1")
     */
    public function seitenlinien1Action($name = Null)
    {

      // get all words we have stored so far
      $repository = $this->getDoctrine()->getRepository('unBundle:Vocabulary');
      $vocabulary = $repository->findAll();


      return $this->render('seitenlinien-1.html.twig', array('vocabulary' => $vocabulary));
    }

    /**
     * @Route("/Seitenlinien-II", name="seitenlinien-2")
     */
    public function seitenlinien2Action(Request $request)
    {
      $french = $request->get('french');
      $german = $request->get('german');
      // if both values are set
      if (isset($french) and !empty('french') and isset($german) and !empty('german'))
      {
        $vocable = new Vocabulary();
        $vocable->setFrench($french);
        $vocable->setGerman($german);

        $em = $this->getDoctrine()->getManager();

        $em->persist($vocable);
        $em->flush();
      }
      return $this->render('seitenlinien-2.html.twig');
    }

    /**
     * @Route("/jobs", name="jobs")
     */
    public function jobsAction($name = Null)
    {
      return $this->render('jobs.html.twig');
    }

    /**
     * @Route("/team", name="team")
     */
    public function teamAction($name = Null)
    {
      return $this->render('team.html.twig');
    }

     /**
     * @Route("/kanzlei", name="kanzlei")
     */   
    public function kanzleiAction($name = Null)
    {
      return $this->render('kanzlei.html.twig');
    }
}
