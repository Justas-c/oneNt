<?php
namespace App\Controller;

// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// property class for get doctrine/repository;
use App\Entity\Property;

class FindPropertyController extends AbstractController
{
    /**
     * @Route("/find-property-{type}/", name="app_find_property")
     */
    public function main($type)
    {
//--------------------------------test------------------------------------------
        $repository = $this->getDoctrine()->getRepository(Property::class);
        $multi_properties = $repository->findby(['type' => $type]);

//--------------------------------test------------------------------------------
        return $this->render('main.html.twig', ['tipas' => $type, 'properties' => $multi_properties]);
    }

    /**
     * Gets single property
     * @Route("individual-property-{id}", name="app_find_single_property")
     */
    public function findSingleProperty($id)
    {
        // 1) get repository
        $repository = $this->getDoctrine()->getRepository(Property::class);
        // 2) get property
        $singleProperty = $repository->find($id);

        return $this->render('properties/simple_single.html.twig', ['property' => $singleProperty]);
    }
}
