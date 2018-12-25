<?php

namespace App\Service\Home;

use App\Post\PostsCollection;

interface HomePageServiceInterface
{
    public function getPosts(): PostsCollection;
}
