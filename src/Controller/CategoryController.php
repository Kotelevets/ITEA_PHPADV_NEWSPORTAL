<?php

namespace App\Controller;

use App\Service\CategoryPageServiceInteface;
use App\Service\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoryController
 * This controller for page by category response.
 */
final class CategoryController extends AbstractController
{
    public function showItem(HomePageServiceInterface $servicePost, CategoryPageServiceInteface $serviceCategory, $item): Response
    {
        $category = $serviceCategory->getCategoryByItem($item);

        if (!$category) {
            throw $this->createNotFoundException(\sprintf('News category \'%s\' not found', $item));
        }

        $categoryDescription = $category->getDescription();
        $dateFormat = 'd.m.Y H:i';
        $posts = $servicePost->getPosts();
        $posts = $posts->getIterator();

        return $this->
        render(
            'category/categoryItem.html.twig',
            [
                'posts' => $posts,
                'dateFormat' => $dateFormat,
                'item' => $item,
                'blockDescription' => $categoryDescription,
            ]
        );
    }
}
