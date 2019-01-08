<?php

namespace App\Category;

use App\Dto\Category as CategoryDto;
use App\Entity\Category;

final class CategoryMapper
{
    public function entityToDto(Category $entity): CategoryDto
    {
        $dto = new CategoryDto(
             $entity->getName(),
             $entity->getDescription()
        );

        $dto->setSlug($entity->getSlug());

        return $dto;
    }

    public function dtoToEntity(CategoryDto $dto): Category
    {
        // TODO: mapper dto to Entity functionality
    }
}
