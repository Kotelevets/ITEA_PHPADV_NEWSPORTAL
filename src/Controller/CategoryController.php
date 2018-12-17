<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\HomePageServiceInterface;

/**
 * Class CategoryController.
 */
final class CategoryController extends AbstractController
{
    public function showItem(HomePageServiceInterface $service, $item): Response
    {
        $posts = $service->getPosts();
        $posts = $posts->getIterator();

        $dateFormat = 'd.m.Y H:i';

        return $this->
        render('category/categoryItem.html.twig',
                   ['posts' => $posts,
                    'dateFormat' => $dateFormat,
                    'item' => $item,
                    'itemTitle' => \ucfirst($item),
                   ]
              );
    }
}
