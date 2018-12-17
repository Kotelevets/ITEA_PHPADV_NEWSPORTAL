<?php

namespace App\Category;

use App\Dto\Category;

class CategoriesCollection implements \IteratorAggregate
{
    private $categories;

    public function __construct(Category ...$Categories)
    {
        $this->categories = $Categories;
    }

    public function addCategory(Category $category): void
    {
        $this->categories[$category->getCategory()] = $category->getDescription();
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categories);
    }
}