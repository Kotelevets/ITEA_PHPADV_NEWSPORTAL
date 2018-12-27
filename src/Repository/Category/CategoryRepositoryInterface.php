<?php

namespace App\Repository\Category;

interface CategoryRepositoryInterface
{
    public function findAllIsPublished();
    public function findBySlug($slug);
}
