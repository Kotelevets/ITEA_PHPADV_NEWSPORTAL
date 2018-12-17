<?php

namespace App\Service;

use App\Category\CategoriesCollection;

interface CategoryPageServiceInteface
{
    public function getCategories(): CategoriesCollection;
}
