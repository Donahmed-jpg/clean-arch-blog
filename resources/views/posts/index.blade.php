{{-- resources/views/posts/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Posts
            </h2>
            <a href="{{ route('posts.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                New Post
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4
                            bg-gray-100 dark:bg-gray-700
                            border border-gray-300 dark:border-gray-600
                            text-gray-800 dark:text-gray-100
                            px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif



            @forelse($posts as $post)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">
                                {{ Str::limit($post->body, 100) }}
                            </p>
                            <span class="text-sm text-gray-400 dark:text-gray-500 mt-2 inline-block">
                                {{ $post->status->value }}
                            </span>
                        </div>
                        <div class="flex gap-2 ml-4">
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-bold py-1 px-3 rounded text-sm">
                                View
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="bg-yellow-100 dark:bg-yellow-900 hover:bg-yellow-200 dark:hover:bg-yellow-800 text-yellow-700 dark:text-yellow-300 font-bold py-1 px-3 rounded text-sm">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure?')"
                                        class="bg-red-100 dark:bg-red-900 hover:bg-red-200 dark:hover:bg-red-800 text-red-700 dark:text-red-300 font-bold py-1 px-3 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-500 dark:text-gray-400">
                        No posts yet. Create your first one!
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>