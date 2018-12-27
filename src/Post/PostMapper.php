<?php

namespace App\Post;

use App\Category\CategoryMapper;
use App\Dto\Post as PostDto;
use App\Entity\Post;

final class PostMapper
{
    public function entityToDto(Post $entity): PostDto
    {
        $categoryMapper = new CategoryMapper();

        $postDto = new PostDto(
             $entity->getShortDescription(),
             $entity->getPublicationDate(),
             $categoryMapper->entityToDto($entity->getCategory())
        );

        $postDto->setImage($entity->getImage());

        return $postDto;
    }

    public function dtoToEntity()
    {
        //TODO: implement
    }
}
