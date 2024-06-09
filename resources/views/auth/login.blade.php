@extends("layouts.auth")

@section("content")
    <section class="flex flex-col justify-center items-center min-h-screen">
        <div class="flex justify-center items-center mb-4">
            <img src="/images/my-logo.png" alt="" width="80" height="80">
            <p class="text-3xl">Postify</p>
        </div>

        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h1 class="text-2xl mb-4">Sign in to your account</h1>

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

                <div class="mb-4 flex justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>

                    <div class="flex items-center">
                        <a href="" class="font-medium text-blue-500 hover:underline">Forgot password?</a>
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="flex justify-center items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-4 py-3 rounded-lg w-full">Login <ion-icon name="arrow-forward-outline"></ion-icon></button>
                </div>

                <div>
                    <p>Don’t have an account yet?
                        <span>
                            <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:underline">Sign up</a>
                        </span>
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection
