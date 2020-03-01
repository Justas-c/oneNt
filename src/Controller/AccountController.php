<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Response\

/**
 * AccountController(Login, Register, etc)
 */
class AccountController // extends AnotherClass
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login()
    {
        die('hello');
    }
}
