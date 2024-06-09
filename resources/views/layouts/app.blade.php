<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="icon" href="{{ url('/images/favicon.ico') }}">
    @vite('resources/css/app.css')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Postify</title>
</head>
<body class="bg-gray-100">
    <nav class="p-2 mb-4 flex justify-center bg-white shadow-md top-0 w-full sticky z-[1]">
        <div class="md:flex md:justify-between w-8/12">
            <div class="flex justify-between items-center">
                <ul class="flex items-center">
                    <li class="p-3">
                        <a href="{{ route('home') }}" class="flex justify-center items-center text-4xl hover:text-blue-500 active:text-blue-500">
                            <ion-icon name="home-outline"></ion-icon>
                        </a>
                    </li>
                </ul>

                <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                    <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
                </span>
            </div>

            <ul id="auth" class="md:flex md:items-center md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500 max-md:shadow-md">
                @auth
                    <div class="relative group">
                        <a class="flex justify-center items-center text-md active:font-bold hover:text-blue-400 text-4xl text-center w-full no-underline sm:w-auto sm:pr-4 py-2 sm:py-1" >
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </a>

                        <div class="absolute z-10 hidden bg-grey-200 group-hover:block">
                            <div class="px-2 pt-2 pb-4 bg-white shadow-lg rounded-lg p-6">
                                <div class="dropdown-menu px-3">
                                    <ul>
                                        <li class="p-3 hover:bg-blue-50 hover:shadow-sm hover:rounded-lg">
                                            <a href="">{{ auth()->user()->username }}</a>
                                        </li>
                                        <li class="p-3 hover:bg-blue-50 hover:shadow-sm hover:rounded-lg">
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit">Logout</button>
                                            </form>
                                        </li>
                                    <ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <li class="p-3 text-3xl">
                        <a href="{{ route('login') }}" class="flex justify-center items-center">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    @yield('content')

    <script>
        function Menu(e){
          let list = document.getElementById("auth");
          e.name === 'menu' ? (e.name = "close",list.classList.add('top-[64px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[64px]'),list.classList.remove('opacity-100'))
        }
    </script>
</body>
</html>
