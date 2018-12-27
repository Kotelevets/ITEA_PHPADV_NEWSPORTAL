<?php

namespace App\Dto;

/**
 * Class Post
 * It's data transfer object for posts.
 */
final class Post
{
    private $image;
    private $description;
    private $publicationDate;
    private $category;

    public function __construct(string $description, \DateTimeInterface $publicationDate, Category $category)
    {
        $this->description = $description;
        $this->publicationDate = $publicationDate;
        $this->category = $category;
    }

    public function setImage(string $src): void
    {
        $this->image = $src;
    }

    public function getImage(): string
    {
        return $this->image ?? 'default.png';
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPublicationDate(): \DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
