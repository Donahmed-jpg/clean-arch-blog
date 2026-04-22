{{-- resources/views/posts/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $post->title }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('posts.edit', $post->id) }}"
                   class="bg-yellow-100 dark:bg-yellow-900 hover:bg-yellow-200 dark:hover:bg-yellow-800 text-yellow-700 dark:text-yellow-300 font-bold py-2 px-4 rounded">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure?')"
                            class="bg-red-100 dark:bg-red-900 hover:bg-red-200 dark:hover:bg-red-800 text-red-700 dark:text-red-300 font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="mb-4">
                        <span class="inline-block bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-sm px-2 py-1 rounded">
                            {{ $post->status->value }}
                        </span>
                    </div>

                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        {{ $post->body }}
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('posts.index') }}"
                           class="text-blue-500 dark:text-blue-400 hover:underline text-sm">
                            ← Back to posts
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>