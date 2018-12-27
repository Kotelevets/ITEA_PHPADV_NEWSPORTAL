<?php

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Post\PostsCollection;

interface HomePageServiceInterface
{
    public function getPosts(): PostsCollection;

    public function getCategories(): CategoriesCollection;
}
