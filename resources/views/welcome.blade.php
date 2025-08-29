<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB sekolah 2025</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; overflow: hidden; }
        #preloader {
            position: fixed; top:0; left:0; width:100%; height:100%; z-index:9999;
            background: linear-gradient(135deg,#6d28d9,#2563eb);
            display: grid; place-items: center; transition: opacity 0.5s ease-in-out;
        }
        #preloader.hidden { opacity:0; }
        .loader { width:50px; aspect-ratio:1; display:grid; }
        .loader::before,.loader::after{content:"";grid-area:1/1;--c:no-repeat radial-gradient(farthest-side,#fff 92%,#0000);
            background:var(--c) 50% 0,var(--c) 50% 100%,var(--c) 100% 50%,var(--c) 0 50%;
            background-size:12px 12px; animation:spin 1s infinite; }
        .loader::before{margin:4px;filter:hue-rotate(90deg);background-size:8px 8px;animation-timing-function:linear}
        @keyframes spin{100%{transform:rotate(.5turn)}}
        @keyframes reveal-main { from{opacity:0;transform:translateY(20px);} to{opacity:1;transform:translateY(0);} }
        .content-reveal { animation:reveal-main 1s ease-out forwards; }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-purple-700 via-indigo-600 to-blue-600 text-white">

    <!-- PRELOADER -->
    <div id="preloader"><div class="loader"></div></div>

    <!-- MAIN -->
    <div id="main-content" class="opacity-0">

        <!-- NAVBAR -->
        <header class="absolute top-0 left-0 w-full bg-transparent z-50">
            <nav class="container mx-auto flex items-center justify-between px-4 py-4">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-2 font-bold text-lg sm:text-xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                    </svg>
                    <span>PPDB NanChill</span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8 text-white font-medium">
                    <a href="#" class="hover:text-indigo-200">Beranda</a>
                    <a href="#info" class="hover:text-indigo-200">Info</a>
                    <a href="#kontak" class="hover:text-indigo-200">Kontak</a>
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-full bg-white text-indigo-600 font-semibold hover:bg-indigo-100 transition">Login</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-full border-2 border-white hover:bg-white hover:text-indigo-600 transition">Register</a>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <button id="menu-btn" class="md:hidden flex flex-col space-y-1 focus:outline-none">
                    <span class="w-6 h-0.5 bg-white"></span>
                    <span class="w-6 h-0.5 bg-white"></span>
                    <span class="w-6 h-0.5 bg-white"></span>
                </button>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-indigo-700/90 backdrop-blur-md px-6 py-4 space-y-4 text-white">
                <a href="#" class="block hover:text-indigo-200">Beranda</a>
                <a href="#info" class="block hover:text-indigo-200">Info</a>
                <a href="#kontak" class="block hover:text-indigo-200">Kontak</a>
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="block px-4 py-2 rounded bg-white text-indigo-600 font-semibold hover:bg-indigo-100">Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block px-4 py-2 rounded border-2 border-white hover:bg-white hover:text-indigo-600">Register</a>
                @endif
            </div>
        </header>

        <!-- HERO SECTION -->
        <div class="relative min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 overflow-hidden">
            <!-- background blur -->
            <div class="absolute top-0 left-0 w-64 h-64 bg-purple-500/20 rounded-full -translate-x-1/3 -translate-y-1/3 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-blue-500/20 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>

            <!-- konten -->
<!-- HERO SECTION -->
<div class="relative min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 overflow-hidden">
    <!-- background blur -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-purple-500/20 rounded-full -translate-x-1/3 -translate-y-1/3 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-blue-500/20 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>

    <!-- konten -->
    <div class="text-center z-10 max-w-3xl mx-auto mt-16 md:mt-24">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight">
            PPDB NanChill 2025
        </h1>
        <p class="mt-4 text-base sm:text-lg md:text-xl text-slate-100">
            Gerbang menuju masa depan cerah. Segera daftarkan diri Anda dan jadilah bagian dari generasi unggul.
        </p>
    </div>
</div>

        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        // preloader
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            const mainContent = document.getElementById('main-content');
            setTimeout(() => {
                preloader.classList.add('hidden');
                mainContent.classList.add('content-reveal');
                setTimeout(() => { preloader.remove(); document.body.style.overflow = 'auto'; }, 500);
            }, 1200);
        });

        // mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
