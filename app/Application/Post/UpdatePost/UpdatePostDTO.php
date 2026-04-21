<?php

namespace App\Application\Post\UpdatePost;

readonly class UpdatePostDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $body
    )
    {}
}