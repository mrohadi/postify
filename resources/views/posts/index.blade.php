@extends("layouts.app")

@section("content")
    <section class="flex flex-col justify-center items-center">
        <div class="w-8/12 bg-white p-6 mb-4 rounded-lg shadow-md">
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                        @error('body')border-red-500 @enderror" placeholder="What's on your mind?"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg font-medium">Post</button>
                </div>
            </form>
        </div>

        @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach

            {{ $posts->links() }}
        @else
            There are no posts yet!
        @endif
    </section>
@endsection
