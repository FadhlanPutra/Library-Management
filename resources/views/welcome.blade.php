<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body class="font-sans antialiased dark:bg-gray-900 dark:text-white/50">


    <nav class="bg-white border-gray-200 p-4 dark:bg-gray-900 drop-shadow-lg">
        <div class="flex justify-end gap-6 items-center px-4 py-3 sm:px-6 lg:px-8">
            <p>{{ now()->format('l, d M Y | H:i ') }}</p>
            <i class="fa-regular fa-calendar"></i>
            <button class="" id="theme-toggle">
                <i id="theme-toogle-icon" class="fas fa-sun"></i>
            </button>
        </div>
    </nav>


<section class="bg-white dark:bg-gray-900 flex justify-center items-center">
        

    <div class="flex flex-col justify-center min-h-screen items-center">
        <img src='/aset/library.webp' alt="Logo" class="w-full max-w-md"/>
        <div class='flex flex-col justify-center items-center w-1/2 text-center'>
            <h1 class='font-bold text-2xl mt-2 mb-2'>Welcome to Library Pesat IT XPRO</h1>
            <p class='text-center font-medium'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quibusdam placeat, veritatis iure tempore vitae, dicta autem aspernatur praesentium fuga eum enim? Sunt minus temporibus repellat autem, asperiores recusandae minima!</p>
            {{-- <link rel="prefetch"  href={route('login')} class='bg-[#6E987C] px-6 py-4 p-2 rounded-lg text-white mt-2'>Login</link> --}}

            <div class="mt-5">
            @if (Route::has('login'))
                            <nav class="flex flex-1 justify-start gap-4">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black bg-slate-500 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black bg-slate-500 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black bg-slate-500 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
            </div>

        </div> 
    </div>

                 
    </section>
</body>

</html>