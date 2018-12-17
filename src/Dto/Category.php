<?php

namespace App\Dto;


final class Category
{
    private $category;
    private $description;

    public function __construct(string $category, string $description)
    {
        $this->category    = $category;
        $this->description = $description;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}
