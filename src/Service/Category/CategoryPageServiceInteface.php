<?php

namespace App\Service\Category;

use App\Dto\Category;
use App\Post\PostsCollection;
use App\Category\CategoriesCollection;

interface CategoryPageServiceInteface
{
    public function getPosts(): PostsCollection;

    public function getCategories(): CategoriesCollection;

    public function getCategory(string $categoryName): Category;
}
