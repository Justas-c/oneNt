<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;


class TestController extends AbstractController
{

    public function test1()
    {
        return new Response('test1 controller');
    }


    // route.yaml - /helloworld
    public function helloWorld() {
        echo 'hello world<br>';
        return new Response('response text');
    }

    // testing annotations
    /**
     * @Route("/")
     */
    public function testhome() {
        echo 'hello testhome<br>';
        return new Response('home response text');
    }

    // test twig
    /**
     * @Route("/twigtest")
     */
    public function testtwig() {
        echo 'hello twig<br>';
        return $this->render('testtmp/testtwig.html.twig');
    }

    // test twig2
    /**
     * @Route("/twigtest2")
     */

     public function testtwig2() {
        echo 'test twig2<br>';
        return $this->render('homepage.html.twig');
     }
}
