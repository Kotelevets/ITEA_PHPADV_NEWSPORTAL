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

        return new PostDto(
            \substr($entity->getBody(), 0, 200),
            new \DateTime(),
            $categoryMapper->entityToDto($entity->getCategory())
        );
    }

    public function dtoToEntity()
    {
        //TODO: implement
    }
}
