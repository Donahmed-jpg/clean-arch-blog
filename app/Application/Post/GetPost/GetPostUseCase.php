<?php

namespace App\Application\Post\GetPost;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;
use RuntimeException;

class GetPostUseCase
{
    public function __construct(
        private PostRepositoryInterface $repository
    )
    {}

    public function execute (int $id): Post
    {
        $post = $this->repository->findById($id);

        if ($post === null) {
            throw new RuntimeException("Post not found.");
        }

        return $post;
    }
}