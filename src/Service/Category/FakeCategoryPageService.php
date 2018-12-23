<?php

namespace App\Service\Category;

use App\Exceptions\CategoryNotFoundException;
use App\Post\PostsCollection;
use App\Category\CategoriesCollection;
use App\Dto\Post;
use App\Dto\Category;
use App\Service\CategoryPageServiceInteface;

final class FakeCategoryPageService implements CategoryPageServiceInteface
{
    private const POSTS_COUNT = 4;

    private $categoryData =
        [
            'world' => 'You can read many interesting articles about our beautiful world there, 
                     such as travelling, archeology, space, people etc.',
            'it' => 'You can read many interesting articles about IT sphere there, 
                     such as programming, managing IT projects, IT career etc.',
            'sport' => 'You can read many interesting articles about sport there, 
                     such as competitions, championships, health life etc.',
            'science' => 'You can read many interesting articles about science there, 
                     such as nano-world, technologies, forums etc.',
        ]
    ;

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

    public function getCategories(): CategoriesCollection
    {
        $collection = new CategoriesCollection();

        foreach ($this->categoryData as $key => $value) {
            $dto = new Category(
                $key,
                $value
            );

            $collection->addCategory($dto);
        }

        return $collection;
    }

    public function getCategory(string $categoryName): Category
    {
        if (array_key_exists($categoryName, $this->categoryData)) {
            $dto = new Category(
                $categoryName,
                $this->categoryData[$categoryName]
            );

            return $dto;
        }

        throw new CategoryNotFoundException();
    }
}
