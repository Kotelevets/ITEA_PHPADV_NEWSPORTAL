<?php

namespace App\Category;

final class CategoriesCollection implements \IteratorAggregate
{
    private $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categories);
    }
}
