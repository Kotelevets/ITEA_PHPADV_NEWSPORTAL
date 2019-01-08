<?php

namespace App\Service\Category;

use App\Dto\Category;
use App\Category\CategoryMapper;
use App\Category\CategoriesCollection;
use App\Post\PostMapper;
use App\Post\PostsCollection;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Exceptions\CategoryNotFoundException;

final class CategoryPageService implements CategoryPageServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Find category entity by slug and mapped it to category DTO
     * Return exception CategoryNotFoundException - if category entity not found.
     */
    public function getCategoryBySlug(string $slug): Category
    {
        $category = $this->categoryRepository->findOneBy(['slug' => $slug]);

        if (!$category) {
            throw new CategoryNotFoundException();
        }

        $mapper = new CategoryMapper();

        return $mapper->entityToDto($category);
    }

    public function getCategories(): CategoriesCollection
    {
        $categories = $this->categoryRepository->findAllIsPublished();

        return new CategoriesCollection($categories);
    }

    public function getPosts(Category $category): PostsCollection
    {
        $dataMaper = new PostMapper();
        $collection = new PostsCollection();
        $entityCategory = $this->categoryRepository->findOneBy(['slug' => $category->getSlug()]);
        $posts = $entityCategory->getPosts();

        foreach ($posts as $post) {
            if ($post->getPublicationDate()) {
                $collection->addPost($dataMaper->entityToDto($post));
            }
        }

        return $collection;
    }
}
