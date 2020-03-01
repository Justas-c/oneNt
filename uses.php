<?php 

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// // testing...:
// use App\Entity\User;

// for request object:
use Symfony\Component\HttpFoundation\Request;
// for response object:
use Symfony\Component\HttpFoundation\Response;
// for test3 testing:
use Twig\Environment;
// for session handling:
use Symfony\Component\HttpFoundation\Session\SessionInterface;
// working with files(some file download in this case):
use Symfony\Component\HttpFoundation\File\File;
// for external redireting
use Symfony\Component\HttpFoundation\RedirectResponse;
// streamed response
use Symfony\Component\HttpFoundation\StreamedResponse;
// json response shorter
use Symfony\Component\HttpFoundation\JsonResponse;
// session
//use Symfony\Component\HttpFoundation\Session\Session;
// Annotations
use Symfony\Component\Routing\Annotation\Route;
// My message generator
use App\Service\MessageGenerator;
// custom made markdown helper
use App\Service\MarkdownHelper;
// for caching(psr cache pool interface)
use Psr\Cache\CacheItemPoolInterface;
// sitas nzn ar yra:
use Symfony\Component\DependencyInjection\ServiceSubscriberInterface;
// use product entity:
use App\Entity\Product;
// entity manager interface:
use Doctrine\ORM\EntityManagerInterface;
// to validate data before $em:
use Symfony\Component\Validator\Validator\ValidatorInterface;
// security controller;
// use App\Controller\SecurityController;
// // // for IsGranted annotation:
// // use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
// // to get the user object:
// use Symfony\Component\Security\Core\Security;
