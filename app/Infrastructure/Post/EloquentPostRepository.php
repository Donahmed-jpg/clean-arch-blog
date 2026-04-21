<?php

namespace App\Infrastructure\Post;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;
use App\Domain\Post\ValueObjects\PostStatus;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function findById(int $id): ?Post
    {
        $model = PostModel::find($id);

        if ($model === null){
            return null;
        }

        return $this->toEntity($model);
    }

    public function findAll(): array
    {
        return PostModel::all()
            ->map(fn(PostModel $model) => $this->toEntity($model))
            ->toArray();
    }

    public function findByAuthor(int $authorId): array
    {
        return PostModel::where('author_id', $authorId)
                ->get()
                ->map(fn(PostModel $model) => $this->toEntity($model))
                ->toArray();
    }

    public function save(Post $post): Post
    {
        $model = PostModel::updateOrCreate(
            ['id' => $post->id],
            [
                'title'     => $post->title,
                'body'      => $post->body,
                'author_id' => $post->authorId,
                'status'    => $post->status->value,
            ]
        );

        return $this->toEntity($model);
    }

    public function delete(int $id): void
    {
        PostModel::destroy($id);
    }



    private function toEntity (PostModel $model): Post
    {
        return new Post (
            id:         $model->id,
            authorId:   $model->author_id,
            title:      $model->title,
            body:       $model->body,
            status:     PostStatus::from($model->status)
        );
    }
}