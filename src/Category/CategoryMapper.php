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
        $entity = new Category();
        $entity
            ->setName($dto->getName())
            ->setSlug($dto->getSlug())
            ->setDescription($dto->getDescription());

        return $entity;
    }
}
