<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La Union Medical Center | Official Website')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --lu-blue: #1a3a8a;
            --lu-red: #dc2626;
            --lu-gold: #facc15;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            scroll-behavior: smooth;
        }
        .hero-gradient {
            background: linear-gradient(135deg, rgba(26,58,138,0.9) 0%, rgba(30,64,175,0.7) 100%);
        }
        .agkaysa-font {
            font-style: italic;
            font-weight: 800;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo_primary.png') }}" alt="LUMC Logo" class="w-16 h-16">
                <div>
                    <h1 class="text-lg md:text-xl font-bold text-blue-900 leading-tight uppercase">
                        {{ config('app.name', 'La Union Medical Center') }}
                    </h1>
                </div>
            </div>

            <nav class="hidden lg:flex items-center gap-6 font-semibold text-sm">
                <a href="#home" class="text-blue-900 hover:text-red-600 transition">HOME</a>
                <a href="#about" class="text-blue-900 hover:text-red-600 transition">ABOUT</a>
                <a href="#mission" class="text-blue-900 hover:text-red-600 transition">MISSION & VISION</a>
                <a href="#services" class="text-blue-900 hover:text-red-600 transition">DEPARTMENTS</a>
                <a href="#contact" class="text-blue-900 hover:text-red-600 transition">CONTACT</a>
                <a href="{{ route('login') }}" class="bg-red-600 text-white px-5 py-2 rounded-md hover:bg-blue-900 transition shadow-lg">
                    LOGIN
                </a>
            </nav>

            <button class="lg:hidden text-2xl text-blue-900">
                <i class="fas fa-bars"></i>
            </button>

            <img src="{{ asset('images/logo_secondary.png') }}" alt="Gov Logo" class="w-16 h-16">
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="contact" class="bg-slate-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <i class="fas fa-hospital text-3xl text-yellow-400"></i>
                        <h4 class="text-xl font-bold tracking-tighter">LUMC</h4>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed mb-6">
                        A center of excellence in healthcare, training, and research in Northern Philippines.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6 border-l-4 border-red-600 pl-4">Contact Info</h4>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-pin text-yellow-400 w-6 flex-shrink-0 pt-1"></i>
                            <span>Barangay Nazareno, Agoo, La Union, 2504</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-phone-alt text-yellow-400 w-6 flex-shrink-0 pt-1"></i>
                            <span>(072) 607-5541</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6 border-l-4 border-red-600 pl-4">Governing Body</h4>
                    <div class="bg-white/5 p-4 rounded-lg border border-white/10">
                        <p class="text-[10px] text-yellow-400 uppercase font-black tracking-widest italic mb-1">Agkaysa!</p>
                        <p class="text-xs font-bold">Province of La Union</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 text-center text-[10px] text-gray-500 font-bold tracking-widest uppercase">
                &copy; {{ date('Y') }} La Union Medical Center | Official Portal
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>