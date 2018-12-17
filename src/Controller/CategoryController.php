<?php

namespace App\Controller;

use App\Service\CategoryPageServiceInteface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\HomePageServiceInterface;

/**
 * Class CategoryController
 * @package App\Controller
 */
final class CategoryController extends AbstractController
{
    public function showItem(HomePageServiceInterface $servicePost,
                             CategoryPageServiceInteface $serviceCategory,
                             $item): Response
    {
        $posts = $servicePost->getPosts();
        $posts = $posts->getIterator();

        $categories = $serviceCategory->getCategories();
        $categories = $categories->getIterator();

        $dateFormat = 'd.m.Y H:i';

        if (!array_key_exists($item, $categories)){
            throw $this->createNotFoundException('The category not found');
        }

        return $this->
        render('category/categoryItem.html.twig',
            [
             'posts' => $posts,
             'categories' => $categories,
             'dateFormat' => $dateFormat,
             'item' => $item
            ]
        );
    }
}
