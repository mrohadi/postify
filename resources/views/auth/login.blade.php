@extends("layouts.app")

@section("content")
    <section class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                        @error('email') border-red-400 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="mt-2 text-red-400 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                        @error('password') border-red-400 @enderror" value="">
                    @error('password')
                        <div class="mt-2 text-red-400 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @if (session('status'))
                    <div class="bg-red-500 p-4 rounded-lg mb-4 text-white text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg w-full">Login</button>
                </div>
            </form>
        </div>
    </section>
@endsection
