<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\NewProject;

/**
 * Nauji projektai
 * info: kolkas static bus, veliau galima bus forma idet
 */
class newProjectsController extends AbstractController
{
    /**
     * @Route("np/nauji-projektai", name="app_nauji_projektai")
     */
    public function naujiProjektai()
    {
        return $this->render('properties/nauji_projektai/nauji_projektai.html.twig');
    }

    /**
     * @Route("np/naujas-projektas-{id}", name="app_naujas_projektas")
     */
    public function naujasProjektas($id = 1)
    {
        $em = $this->getDoctrine()->getRepository(NewProject::class);
        $ntProjektas = $em->find($id);
        return $this->render('properties/nauji_projektai/naujas_projektas.html.twig', ['project' => $ntProjektas]);
    }
}
