<?php

namespace App\Application\Post\CreatePost;

readonly class CreatePostDTO
{
    public function __construct(
        public string $title,
        public string $body,
        public int $authorId
    )
    { }
}