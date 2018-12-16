<?php

namespace App\Controller;

use App\Service\HomePageServiceInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Default site controller
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DefaultController extends AbstractController
{
    public function index(HomePageServiceInterface $service): Response
    {
        $posts = $service->getPosts();
        $posts = $posts->getIterator();

        ///* корнем считается папка templates */
        return $this->render('default/index.html.twig', ['posts' => $posts]);
    }
}
