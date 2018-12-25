<?php

namespace App\Controller;

use App\Exceptions\CategoryNotFoundException;
use App\Service\Category\CategoryPageServiceInteface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoryController
 * This controller for page by category response.
 */
final class CategoryController extends AbstractController
{
    public function showPageByCategory(CategoryPageServiceInteface $serviceCategory, $categoryName): Response
    {
        try {
            $category = $serviceCategory->getCategory($categoryName);
        } catch (CategoryNotFoundException $e) {
            throw $this->createNotFoundException(\sprintf('News category \'%s\' not found', $categoryName));
        }

        $categoryDescription = $category->getDescription();
        $posts = $serviceCategory->getPosts();

        return $this->
        render(
            'category/category.html.twig',
            [
                'posts' => $posts,
                'categoryName' => $categoryName,
                'blockDescription' => $categoryDescription,
            ]
        );
    }
}
