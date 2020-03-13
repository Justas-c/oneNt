<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response\
// for @IsGranded annotation:
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\AddPropertyFormType;
use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;

/**
 * AccountController(Login, Register, etc)
 * @IsGranted("ROLE_USER")
 */
class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="app_account")
     */
    public function account()
    {
        die('die(account method)');
    }

    /**
     * @Route("/add_property", name="app_add_property")
     */
    public function addPropertyPost(Request $request, EntityManagerInterface $em){
        //$addp = new Property();
        $form = $this->createForm(AddPropertyFormType::class); //, $addp);
        // to handle post request:
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // creates Property obj with posted as properties
            $postedPropertyData = $form->getData();

            $file = $form->get('nuotraukos')->getData();
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename.'-'.uniqid().'.'.$file->guessExtension();

            // Move the file to the directory where images are stored
            try {
                $file->move($this->getParameter('images_directory'), $newFilename);
            } catch (FileException $e) {
                //add flash,  redirect to formpage
                // ... handle exception if something happens during file upload
            }

            // image name
            $postedPropertyData->setNuotraukos($newFilename);

            // info
            dump($request);
            dump($originalFilename);
            dump($newFilename);
            //dd($postedPropertyData);


            // persist and flush posted object
            $em->persist($postedPropertyData);
            $em->flush();

            // flash message
            $this->addFlash('success', 'Jūsų skelbimas įkeltas');

             return $this->redirectToRoute('app_find_single_property', ['id' => $postedPropertyData->getId()]);
            //return $this->redirectToRoute('app_homepage');
        }

        return $this->render('account/add_property_form.html.twig', ['addPropertyForm' => $form->createView()]);
    }
}

// $form->handleRequest($request);

// // // if invalid
// // if ($form->isSubmitted() && !$form->isValid()){
// //     die('form not valid');
// // }
//
// // on submit:
// if ($form->isSubmitted() && $form->isValid()){
//     /** @var User $user **/
//     $user = $form->getData();
//     $user->setEmail($user->getEmail());
//     $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
//     $user->setFirstName('vardas');
//     $user->setLastName('Pavarde');
//     $em = $this->getDoctrine()->getManager();
//     $em->persist($user);
//     $em->flush();
