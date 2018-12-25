<?php

namespace App\Service\Home;

use App\Dto\Post;
use App\Dto\Category;
use App\Post\PostsCollection;
use Faker\Factory;

/**
 * Class FakeHomePageService that generates test data.
 */
final class FakeHomePageService implements HomePageServiceInterface
{
    private const POSTS_COUNT = 4;

    private const CATEGORIES = [
        'it' => [
            'name' => 'IT',
        ],
        'world' => [
            'name' => 'World',
        ],
        'science' => [
            'name' => 'Sciense',
        ],
        'sport' => [
            'name' => 'Sport',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        $faker = Factory::create();
        $collection = new PostsCollection();

        for ($i = 0; $i < self::POSTS_COUNT; ++$i) {
            $categoryKey = \array_rand(self::CATEGORIES, 1);
            $category = self::CATEGORIES[$categoryKey];

            $dto = new Post(
                $faker->text,
                $faker->dateTime,
                new Category($category['name'], $faker->sentence)
            );
            $dto->setImage($faker->imageUrl());

            $collection->addPost($dto);
        }

        return $collection;
    }
}
