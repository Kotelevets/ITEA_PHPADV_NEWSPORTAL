<?php

namespace App\Post;

use App\Dto\Post;

class PostsCollection implements \IteratorAggregate
{
    private $posts;

    public function __construct(Post ...$posts)
    {
        $this->posts = $posts;
    }

    public function addPost(Post $post): void
    {
        $this->posts[] = $post;
    }

    public function shift(): ?Post
    {
        return \array_shift($this->posts);
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->posts);
    }
}
