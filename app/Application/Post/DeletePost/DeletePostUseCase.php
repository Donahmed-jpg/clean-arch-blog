<?php

namespace App\Application\Post\DeletePost;

use App\Domain\Post\PostRepositoryInterface;
use RuntimeException;

class DeletePostUseCase
{
    public function __construct(
        private PostRepositoryInterface $repository,
    )
    { }

    public function execute (int $id): void
    {
        $post = $this->repository->findById($id);

        if ($post === null) {
            throw new RuntimeException("Post not found.");
        }

        $this->repository->delete($id);
    }
}