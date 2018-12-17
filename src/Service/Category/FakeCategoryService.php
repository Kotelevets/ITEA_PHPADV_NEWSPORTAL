<?php

namespace App\Service\Category;

use App\Dto\Category;
use App\Category\CategoriesCollection;
use App\Service\CategoryPageServiceInteface;

final class FakeCategoryService implements CategoryPageServiceInteface
{
    private $inputArray =
        [
            'world'   => 'You can read many interesting articles about our beautiful world there, 
                     such as travelling, archeology, space, people etc.',
            'it'      => 'You can read many interesting articles about IT sphere there, 
                     such as programming, managing IT projects, IT career etc.',
            'sport'   => 'You can read many interesting articles about sport there, 
                     such as competitions, championships, health life etc.',
            'science' => 'You can read many interesting articles about science there, 
                     such as nano-world, technologies, forums etc.'
        ]
    ;

    public function getCategories(): CategoriesCollection
    {
        $collection = new CategoriesCollection();

        foreach ($this->inputArray as $key => $value ) {

            $dto = new Category(
                $key,
                $value
            );

            $collection->addCategory($dto);
        }

        return $collection;
    }
}
