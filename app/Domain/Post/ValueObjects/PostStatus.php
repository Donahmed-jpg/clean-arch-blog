<?php

namespace App\Domain\Post\ValueObjects;

enum PostStatus: string
{
    case DRAFT = "draft";
    case PUBLISHED = "published";
}