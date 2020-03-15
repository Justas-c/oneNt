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
        // JSON:

        //$response = new Response();
        // // test:
        // $response->setContent(json_encode([
        //     'data' => 123,
        // ]));
        // $response->headers->set('Content-Type', 'application/json');
        //return $response;


        // $found_properties = $this->getDoctrine()->getRepository(Property::class)
        // ->findByOneParam($request->query->get('tipas')) ;
        // dump($found_properties);

        // $found_properties = $this->getDoctrine()->getRepository(Property::class)
        // ->findByParams($request->query->get('tipas'));
        // dd($found_properties);

        // $found_properties = $this->getDoctrine()->getRepository(Property::class)
        // ->findByParams($request->query->get('tipas'), $request->query->get('miestas'), $request->query->get('apdaila'));
        // dd($found_properties);

        $searchParams = [];
        $queryParams = ($request->query);
        //dd($queryParams);

        $availableFields = ['type', 'plotas', 'kambariu_skaicius', 'apdaila', 'miestas', 'rajonas'];

        //dd($queryParams);
        // add all params for query
        foreach ($queryParams as $key => $param) {
            // just in case, there must be better options though...
            if (!in_array($key, $availableFields)){
                //dump($key);
                die('page unavailable');
            }
            $searchParams[$key] = $param;
        }

        // run query, get properties
        $foundProperties = $this->getDoctrine()->getRepository(Property::class)
        ->findByParams($searchParams);

        //die('check');
        $foundEncodedProperties = json_encode($foundProperties);
        dump($foundEncodedProperties);

        $response = new Response();
        $response->setContent(json_encode($foundProperties));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
        //die('check2');
        //die('check');
        // dump($foundProperties);
        // $not_private_arr = [];
        //
        // foreach ($foundProperties as $property) {
        //     $not_private_arr[] = $property->getGatve();
        //     $not_private_arr[] = $property->getPlotas();
        // }
        //
        // $json_encoded_public = json_encode($not_private_arr);
        // dd($json_encoded_public);
        // die('gg');
        //return $this->json(['foundProperties' => $foundProperties]);


        //test:
        // $qp1 = $request->query->get('type');
        // $qp2 = $request->query->get('apdaila');
        // $query_params = [$qp1, $qp2];
        //
        // return $this->render('testtmp/testtwig.html.twig', ['qp' => $query_params]);
    }
}
