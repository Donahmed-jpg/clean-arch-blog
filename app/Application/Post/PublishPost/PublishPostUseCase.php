<?php
// app/Application/Post/PublishPost/PublishPostUseCase.php
namespace App\Application\Post\PublishPost;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;

class PublishPostUseCase
{
    public function __construct(
        private PostRepositoryInterface $repository,
    ) {}

    public function execute(int $id): Post
    {
        $post = $this->repository->findById($id);

        if ($post === null) {
            throw new \RuntimeException("Post not found.");
        }

        $updated = $post->isPublished()
            ? $post->unpublish()
            : $post->publish();

        return $this->repository->save($updated);
    }
}