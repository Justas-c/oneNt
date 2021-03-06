<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 *
 * Register, Login, logout.
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $formAuthenticator)
    {
        // create form:
        $form = $this->createForm(UserRegistrationFormType::class);
        $form->handleRequest($request);

        // // if invalid
        // if ($form->isSubmitted() && !$form->isValid()){
        //     die('form not valid');
        // }

        // on submit:
        if ($form->isSubmitted() && $form->isValid()){
            /** @var User $user **/
            $user = $form->getData();
            $user->setEmail($user->getEmail());
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
            $user->setFirstName('vardas');
            $user->setLastName('Pavarde');
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

        // return $this->redirectToRoute('app_homepage');
        return $guardHandler->authenticateUserAndHandleSuccess($user, $request, $formAuthenticator,'main');
        }

        return $this->render('security/register.html.twig',[
            'registerForm' => $form->createView()
        ]);
    }
}
