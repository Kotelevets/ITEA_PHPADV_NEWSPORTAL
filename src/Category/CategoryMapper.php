<?php

namespace App\Category;

use App\Dto\Category as CategoryDto;
use App\Entity\Category;

final class CategoryMapper
{
    public function entityToDto(Category $entity): CategoryDto
    {
        return new CategoryDto(
            $entity->getName(),
            ''
        );
    }
}
