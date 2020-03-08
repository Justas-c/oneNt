<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

// for testing
use Symfony\Component\HttpFoundation\Response;

/**
 * Home controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
     public function homepage()
     {
         return $this->render('home_tmpl/homepage.html.twig');

     }

     /**
      * @Route("t1", name="test1")
      */
     public function test1()
     {
         return new Response('Response stexttt');
     }
}
