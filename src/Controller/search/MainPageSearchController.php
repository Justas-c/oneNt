<?php
namespace App\Controller\search;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Property;

/**
 * Search endpoint
 */
class MainPageSearchController extends AbstractController
{
    /**
     * @Route("search/mainSearchEP", name="app_mainSearch")
     */
    public function mainSearch(Request $request)
    {

        $searchParams = [];
        $queryParams = ($request->query);
        $availableFields = ['type', 'plotas', 'kambariu_skaicius', 'apdaila', 'miestas', 'rajonas'];

        // add all params for query
        foreach ($queryParams as $key => $param) {
            // just in case, there must be better options though...
            if (!in_array($key, $availableFields)){
                die('page unavailable');
            }
            $searchParams[$key] = $param;
        }

        // run query, get properties
        $foundProperties = $this->getDoctrine()->getRepository(Property::class)
        ->findByParams($searchParams);

        $response = new Response();
        $response->setContent(json_encode($foundProperties));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
