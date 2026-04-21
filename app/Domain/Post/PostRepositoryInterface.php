<?php

namespace App\Domain\Post;

interface PostRepositoryInterface
{
    public function findById(int $id): ?Post;

    /** @return Post[] */
    public function findAll(): array;

    /** @return Post[] */
    public function findByAuthor(int $authorId): array;

    public function save(Post $post): Post;

    public function delete(int $id): void;
}