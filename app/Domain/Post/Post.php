<?php
//Post entity

namespace App\Domain\Post;

use App\Domain\Post\ValueObjects\PostStatus;

class Post
{
    public function __construct(
        public readonly ?int $id,
        public readonly int $authorId,
        public readonly string $title,
        public readonly string $body,
        public readonly PostStatus $status,
    )
    {  }

    public function publish(): self
    {
        return new self(
            $this->id,
            $this->authorId,
            $this->title,
            $this->body,
            PostStatus::PUBLISHED,
        );
    }

    public function unpublish(): self
    {
        return new self(
            $this->id,
            $this->authorId,
            $this->title,
            $this->body,
            PostStatus::DRAFT,
        );
    }

    public function isDraft(): bool
    {
        return $this->status === PostStatus::DRAFT;
    }

    public function isPublished(): bool
    {
        return $this->status === PostStatus::PUBLISHED;
    }

}