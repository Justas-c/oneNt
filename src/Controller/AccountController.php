<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Response\
// for @IsGranded annotation:
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * AccountController(Login, Register, etc)
 * @IsGranted("ROLE_USER")
 */
class AccountController // extends AnotherClass
{
    /**
     * @Route("/account", name="app_account")
     */
    public function account()
    {
        die('die(account method)');
    }

    // /**
    //  * @Route("/add_property", name="app_add_property")
    //  */
    // public function addPropertyPost(){
    //     return $this->render('add_property_form.html.twig');
    // }
}
