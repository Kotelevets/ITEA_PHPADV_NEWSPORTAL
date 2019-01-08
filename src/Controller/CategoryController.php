<?php

namespace App\Controller;

use App\Exceptions\CategoryNotFoundException;
use App\Service\Category\CategoryPageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoryController
 * This controller for page by category response.
 * Controller for post category page.
 */
final class CategoryController extends AbstractController
{
    /**
     * Renders category page by provided slug.
     *
     * @param string                       $slug
     * @param CategoryPageServiceInterface $service
     *
     * @return Response
     */
    public function view($slug, CategoryPageServiceInterface $service): Response
    {
        try {
            $category = $service->getCategoryBySlug($slug);
        } catch (CategoryNotFoundException $e) {
            throw $this->createNotFoundException(\sprintf('News category \'%s\' not found', $slug));
        }

        $categories = $service->getCategories();
        $posts = $service->getPosts($category);

        return $this->
        render(
            'category/category.html.twig',
            [
                'slug' => $slug,
                'category' => $category,
                'categories' => $categories,
                'posts' => $posts,
            ]
        );
    }
}
