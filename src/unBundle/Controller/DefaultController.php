<?php

namespace unBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use unBundle\Entity\Vocabulary;
use unBundle\Entity\Product;
use unBundle\Entity\Category;
use unBundle\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/*
just a little test for better not asking :-)
*/

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

    
    /**
     * @Route("product", name="product")
     */
    public function createAction()
    {
      $product = new Product();
      $product->setName('A Foo Bar');
      $product->setPrice('19.99');
      $product->setDescription('Lorem ipsum dolor');

      $em = $this->getDoctrine()->getManager();

      $em->persist($product);
      $em->flush();

      return $this->render('product.html.twig');
     }


    /**
     * @Route("newtask", name="newtask")
     */
    public function newAction(Request $request)
    {
    
    $em = $this->getDoctrine()->getManager();
    $query = $em->createQuery(
      'SELECT DISTINCT c.name
       FROM unBundle:Category c');

    $categories = $query->getResult();

    $task     = new Task();
    $category = new Category();

    $form = $this->createFormBuilder($task)
    ->add('task', 'text', array(
      'attr' => array('minlength' => 4),
      'label'  => 'Task Titel',)
      )
    ->add('dueDate', 'date', array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd',)
    )

    ->add('save', 'submit', array('label' => 'Create Task'))
    ->getForm(); 


    $category->setName("Aloha");
    $task->setCategory($category); 
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($task);
      $em->persist($category);
      $em->flush();

      return $this->redirectToRoute('tasks_success');
    }

    return $this->render('new.html.twig', array(
        'form' => $form->createView(),
    ));
  }

   /**
     * @Route("tasks_success", name="tasks_success")
     */
  public function task_successAction(Request $request)
  {
    //$repository = $this->getDoctrine()->getRepository('unBundle:Task');
    $em = $this->getDoctrine()->getManager();
    $tasks = $em->getRepository('unBundle:Task')
    ->findAllOrderedBydueDate();

    return $this->render('tasks_success.html.twig', array('tasks' => $tasks));
  }

   /**
     * @Route("/task/{slug}", name="task_success")
     */  
  public function getTaskBySlugAction($slug) 
  {
    $slugURL = $slug;

    $em = $this->getDoctrine()->getManager();
    $query = $em->createQuery(
      'SELECT t
      FROM unBundle:Task t
      WHERE t.slug = :slug'
    )->setParameter('slug', $slugURL);

  $task = $query->setMaxResults(1)->getOneOrNullResult();
  $name = $task->getCategory()->getName();


    return $this->render('task_success.html.twig', array('task' => $task, 'name' => $name));
  }
}
