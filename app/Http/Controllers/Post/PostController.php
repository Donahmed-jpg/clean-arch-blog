<?php

namespace App\Http\Controllers\Post;

use App\Application\Post\CreatePost\CreatePostDTO;
use App\Application\Post\CreatePost\CreatePostUseCase;
use App\Application\Post\DeletePost\DeletePostUseCase;
use App\Application\Post\GetAllPosts\GetAllPostsUseCase;
use App\Application\Post\GetPost\GetPostUseCase;
use App\Application\Post\UpdatePost\UpdatePostDTO;
use App\Application\Post\UpdatePost\UpdatePostUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    //

    public function __construct(
        private CreatePostUseCase $createPost,
        private UpdatePostUseCase $updatePost,
        private DeletePostUseCase $deletePost,
        private GetPostUseCase    $getPost,
        private GetAllPostsUseCase $getAllPosts,
    )
    {}
    // request -> method -> data to dto (if necessary) 
    // -> usecase -> repository -> model
    public function index(): View
    {
        $posts = $this->getAllPosts->execute();

        return view ('posts.index', ["posts" => $posts]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {
        $dto = new CreatePostDTO(
            title: $request->title,
            body: $request->body,
            authorId: $request->user()->id,
        );

        $this->createPost->execute($dto);

        return redirect()->route('posts.index')
                ->with('success', 'Post created successfully.');
    }

    public function show(int $id): View
    {
        $post = $this->getPost->execute($id);

        return view('posts.show', ['post' => $post]);
    }

    public function edit (int $id): View
    {
        $post = $this->getPost->execute($id);

        return view ('posts.edit', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request, int $id): RedirectResponse
    {
        $dto = new UpdatePostDTO(
            id: $id,
            title: $request->title,
            body: $request->body,
        );

        $this->updatePost->execute($dto);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deletePost->execute($id);

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
