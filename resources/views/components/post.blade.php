@props(['post' => $post])

<div class="w-8/12 bg-white py-6 px-6 mb-2 rounded-md shadow-md">
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <div>
        <div class="flex items-center">
            <a href="{{ route('user.posts', $post->user) }}" class="text-5xl flex">
                <ion-icon name="person-circle-outline"></ion-icon>
            </a>
            <div class="flex flex-col">
                <a href="{{ route('user.posts', $post->user) }}" class="font-bold hover:underline">{{ $post->user->name }}</a>
                <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>

        <p class="mb-2">{{ $post->body }}</p>
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

        <div class="flex items-center">
            @auth
                @if (!$post->likeBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">
                            <ion-icon name="heart-outline" class="text-3xl"></ion-icon>
                        </button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">
                            <ion-icon name="heart-dislike" class="text-3xl"></ion-icon>
                        </button>
                    </form>
                @endif
            @endauth

        </div>
    </div>
</div>
