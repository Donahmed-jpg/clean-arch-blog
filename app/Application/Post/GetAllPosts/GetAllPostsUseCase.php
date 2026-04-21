<?php

namespace App\Application\Post\GetAllPosts;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;

class GetAllPostsUseCase
{
    public function __construct(
        private PostRepositoryInterface $repository
    )
    { }

    /** @return Post[] */
    public function execute(): array
    {
        return $this->repository->findAll();
    }
}