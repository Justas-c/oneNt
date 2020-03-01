<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Response\
// for @IsGranded annotation:
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * AccountController(Login, Register, etc)
 */
class AccountController // extends AnotherClass
{
    /**
     * @Route("/account", name="app_account")
     * @IsGranted("ROLE_USER")
     */
    public function account()
    {
        die('die(account method)');
    }
}
