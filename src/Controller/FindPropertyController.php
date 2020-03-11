<?php
namespace App\Controller;

// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FindPropertyController extends AbstractController
{
    /**
     * @Route("/find-property-{type}/", name="app_find_property")
     */
    public function main($type)
    {
        return $this->render('main.html.twig', ['tipas' => $type]);
    }

    /**
     * Gets single property
     * @Route('individual-property-{id}', name="app_single_property")
     */
    public function singleProperty($id)
    {
        return $this->render('single.html.twig', ['id' => $id]);
    }
}
