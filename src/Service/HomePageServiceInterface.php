<?php

namespace App\Service;


use App\Post\PostsCollection;

interface HomePageServiceInterface
{
    public function getPosts(): PostsCollection;
}