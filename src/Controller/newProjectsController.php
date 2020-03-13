<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function naujasProjektas($id)
    {
        return $this->render('properties/nauji_projektai/naujas_projektas.html.twig');
    }
}
