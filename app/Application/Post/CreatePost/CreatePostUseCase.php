<?php

namespace App\Application\Post\CreatePost;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;
use App\Domain\Post\ValueObjects\PostStatus;

class CreatePostUseCase
{
    public function __construct(
        private PostRepositoryInterface $repository,
    )
    {
        
    }

    public function execute(CreatePostDTO $dto): Post
    {
        $post = new Post(
            id: null,
            authorId: $dto->authorId,
            title: $dto->title,
            body: $dto->body,
            status: PostStatus::DRAFT,
        );

        return $this->repository->save($post);
    }
}