@extends("layouts.app")

@section("content")
    <section class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-post :post="$post" />
        </div>
    </section>
@endsection
