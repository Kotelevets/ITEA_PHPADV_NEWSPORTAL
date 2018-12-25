<?php

namespace App\Controller;

use App\Service\Home\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Default site controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DefaultController extends AbstractController
{
    public function index(HomePageServiceInterface $service): Response
    {
        $posts = $service->getPosts();

        ///* корнем считается папка templates */
        return $this->
        render(
            'default/index.html.twig',
            [
                'posts' => $posts,
            ]
        );
    }
}
