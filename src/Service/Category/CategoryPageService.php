<?php

namespace App\Service\Category;

use App\Category\CategoriesCollection;
use App\Category\CategoryMapper;
use App\Dto\Category;
use App\Post\PostMapper;
use App\Post\PostsCollection;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Post\PostRepositoryInterface;

final class CategoryPageService implements CategoryPageServiceInterface
{
    private $categoryRepository;
    private $postRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function getCategoryBySlug(string $slug): Category
    {
        $dataMaper = new CategoryMapper();
        foreach ($this->categoryRepository->findBySlug($slug) as $category) {
            $resultCategory = $dataMaper->entityToDto($category);
        }

        return $resultCategory;
    }

    public function getCategories(): CategoriesCollection
    {
        $categories = $this->categoryRepository->findAllIsPublished();

        return new CategoriesCollection($categories);
    }

    public function getPosts(Category $category): PostsCollection
    {
        $dataMaper = new CategoryMapper();
        $posts = $this->postRepository->findByCategory($dataMaper->dtoToEntity($category));
        $collection = new PostsCollection();
        $dataMaper = new PostMapper();

        foreach ($posts as $post) {
            $collection->addPost($dataMaper->entityToDto($post));
        }

        return $collection;
    }
}
