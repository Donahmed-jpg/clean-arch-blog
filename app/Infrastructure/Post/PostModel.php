<?php

namespace App\Infrastructure\Post;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'author_id',
        'status'
    ];
}