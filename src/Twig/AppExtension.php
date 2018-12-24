<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('imagePath', [$this, 'imagePathFilter']),
        ];
    }

    public function imagePathFilter(string $path): string
    {
        return 'defaut.png' === $path ? \sprintf('/img/%s', $path) : $path;
    }
}
