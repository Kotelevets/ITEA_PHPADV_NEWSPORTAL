<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PostFixtures extends Fixture
{
    private const POSTS_NUMBER = 15;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::POSTS_NUMBER; ++$i) {
            $post = new Post();

            $category = $this->getReference(Category::class.'_'.$faker->numberBetween(0, 3));

            $post
                ->setTitle($faker->sentence)
                ->setSlug($faker->slug)
                ->setBody($faker->boolean ? $faker->text(300) : $faker->text(400))
                ->setCategory($category)
            ;

            $manager->persist($post);
        }

        $manager->flush();
    }
}
