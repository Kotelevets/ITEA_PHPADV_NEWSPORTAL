<?php

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Dto\Post;
use App\Dto\Category as CategoryDTO;
use App\Entity\Category;
use App\Post\PostsCollection;
use App\Repository\Category\CategoryRepositoryInterface;

class HomePageService implements HomePageServiceInterface
{

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        return new PostsCollection(new Post('', new \DateTime(), new CategoryDTO('', '')));
    }

    public function getCategories(): CategoriesCollection
    {
        $categories = $this->categoryRepository->findAllIsPublished();

        return new CategoriesCollection($categories);
    }
}
