<?php

namespace App\Category;

use App\Entity\Category;

final class CategoriesCollection implements \IteratorAggregate
{
    private $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /*
        public function addCategory(Category $category): void
        {
            $this->categories[$category->getCategory()] = $category->getDescription();
        }
    */
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categories);
    }
}
