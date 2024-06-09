@extends("layouts.auth")

@section("content")
    <section class="flex flex-col justify-center items-center min-h-screen">
        <div class="flex justify-center items-center mb-4">
            <img src="/images/my-logo.png" alt="" width="80" height="80">
            <p class="text-3xl">Postify</p>
        </div>

        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h1 class="text-2xl mb-4">Sign up new account</h1>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                        @error('name') border-red-400 @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="mt-2 text-red-400 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                        @error('username') border-red-400 @enderror" value="{{ old('username') }}">
                    @error('username')
                        <div class="mt-2 text-red-400 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Your password confirmation" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg w-full">Register</button>
                </div>

                <div>
                    <p>Already have an account?
                        <span>
                            <a href="{{ route('login') }}" class="font-medium text-blue-500 hover:underline">Sign in</a>
                        </span>
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection
