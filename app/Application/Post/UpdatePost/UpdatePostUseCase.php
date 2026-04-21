<?php

namespace App\Application\Post\UpdatePost;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;
use RuntimeException;

class UpdatePostUseCase
{
    public function __construct(
        private PostRepositoryInterface $repository
    )
    { }

    public function execute(UpdatePostDTO $dto): Post
    {
        $post = $this->repository->findById($dto->id);

        if ($post === null) {
            throw new RuntimeException("Post not found.");
        }

        $update = new Post(
            id:         $post->id,
            authorId:   $post->authorId,
            title:      $dto->title,
            body:       $dto->body,
            status:     $post->status
        );

        return $this->repository->save($update);
    }
}