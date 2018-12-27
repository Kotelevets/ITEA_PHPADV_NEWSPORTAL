<?php

namespace App\Repository\Post;

use App\Dto\Category;

interface PostRepositoryInterface
{
    public function findAllWithCategories();

    public function findPublished();

    public function findByCategory(Category $category);
}
