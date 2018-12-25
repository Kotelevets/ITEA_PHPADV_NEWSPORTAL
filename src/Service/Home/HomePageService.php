<?php

namespace App\Service\Home;

use App\Post\PostsCollection;

class HomePageService implements HomePageServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        throw new \LogicException(__METHOD__.' not implemented');
    }
}
