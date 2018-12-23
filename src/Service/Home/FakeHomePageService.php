<?php

namespace App\Service\Home;

use App\Dto\Post;
use App\Post\PostsCollection;
use App\Service\HomePageServiceInterface;

final class FakeHomePageService implements HomePageServiceInterface
{
    private const POSTS_COUNT = 4;

    public function getPosts(): PostsCollection
    {
        $faker = \Faker\Factory::create();
        $collection = new PostsCollection();

        for ($i = 0; $i < self::POSTS_COUNT; ++$i) {
            $dto = new Post(
                $faker->text,
                $faker->dateTime
            );
            $dto->setImage($faker->imageUrl());

            $collection->addPost($dto);
        }

        return $collection;
    }
}
