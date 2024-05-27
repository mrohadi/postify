@extends("layouts.app")

@section("content")
    <section class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                There are no posts yet!
            @endif
        </div>
    </section>
@endsection
