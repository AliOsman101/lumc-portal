<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - La Union Medical Center | Patient Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div
            class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img
                    src="{{ asset('images/LUMC_LOGO.png') }}"
                    alt="logo" class="w-16 h-16">
                <div>
                    <h1
                        class="text-lg md:text-xl font-bold text-blue-900 leading-tight">LA
                        UNION MEDICAL CENTER</h1>
                </div>
            </div>

            <nav
                class="hidden lg:flex items-center gap-6 font-semibold text-sm">
                <a href="{{ url('/') }}"
                    class="text-blue-900 hover:text-red-600 transition">HOME</a>
                <a href="{{ url('/') }}#about"
                    class="text-blue-900 hover:text-red-600 transition">ABOUT</a>
                <a href="{{ url('/') }}#mission"
                    class="text-blue-900 hover:text-red-600 transition">MISSION
                    & VISION</a>
                <a href="{{ url('/') }}#services"
                    class="text-blue-900 hover:text-red-600 transition">DEPARTMENTS</a>
                <a href="{{ route('login') }}"
                    class="bg-red-600 text-white px-5 py-2 rounded-md hover:bg-blue-900 transition shadow-lg">LOGIN</a>
            </nav>

            <button class="lg:hidden text-2xl text-blue-900">
                <i class="fas fa-bars"></i>
            </button>

            <img src="{{ asset('images/BagongPilipinas.png') }}"
                alt="logo" class="w-16 h-16">
        </div>
    </header>

    <!-- Registration Section -->
    <section class="min-h-screen py-20 flex items-center">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center max-w-5xl mx-auto">
                
                <!-- Left Panel - Info -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-black text-blue-900 mb-4 leading-tight">
                            Create Your<br><span class="text-red-600">Patient Account</span>
                        </h2>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Join thousands of patients who trust LUMC for quality healthcare. Create your account today and gain access to your medical records, appointments, and personalized services.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-lock text-red-600 text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900 mb-1">Secure & Private</h4>
                                <p class="text-sm text-gray-600">Your data is encrypted and protected with the highest security standards.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-file-medical text-blue-900 text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900 mb-1">Access Your Records</h4>
                                <p class="text-sm text-gray-600">View medical history, test results, and prescriptions anytime.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-calendar-check text-yellow-600 text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900 mb-1">Book Appointments</h4>
                                <p class="text-sm text-gray-600">Schedule appointments with doctors directly through the portal.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Already have account -->
                    <div class="pt-6 border-t border-gray-300">
                        <p class="text-gray-600">Already have an account? 
                            <a href="{{ route('login') }}" class="text-red-600 font-bold hover:text-red-700">Sign In Here</a>
                        </p>
                    </div>
                </div>

                <!-- Right Panel - Registration Form -->
                <div class="bg-white p-8 rounded-2xl shadow-2xl">
                    <h3 class="text-2xl font-bold text-blue-900 mb-6">Register Now</h3>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Full Name Field -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                            <div class="flex items-center border-b-2 border-gray-300 focus-within:border-red-600">
                                <i class="fas fa-user text-gray-500 mr-3"></i>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus
                                    class="w-full py-2 bg-transparent outline-none text-gray-800">
                            </div>
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                            <div class="flex items-center border-b-2 border-gray-300 focus-within:border-red-600">
                                <i class="fas fa-envelope text-gray-500 mr-3"></i>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required
                                    class="w-full py-2 bg-transparent outline-none text-gray-800">
                            </div>
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 focus-within:border-red-600">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" name="password" placeholder="Create a strong password" required
                                    class="w-full py-2 bg-transparent outline-none text-gray-800">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Minimum 8 characters with uppercase, lowercase, and numbers.</p>
                            @error('password')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Confirm Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 focus-within:border-red-600">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" name="password_confirmation" placeholder="Confirm your password" required
                                    class="w-full py-2 bg-transparent outline-none text-gray-800">
                            </div>
                        </div>

                        <!-- Terms Checkbox -->
                        <div class="mb-6 flex items-start gap-3">
                            <input type="checkbox" name="terms" id="terms" required class="w-4 h-4 text-red-600 rounded cursor-pointer mt-1">
                            <label for="terms" class="text-sm text-gray-600 cursor-pointer">
                                I agree to the <a href="#" class="text-red-600 font-bold hover:text-red-700">Terms of Service</a> and 
                                <a href="#" class="text-red-600 font-bold hover:text-red-700">Privacy Policy</a>
                            </label>
                        </div>

                        <!-- Register Button -->
                        <button type="submit" class="w-full bg-red-600 text-white font-bold py-3 rounded-lg hover:bg-red-700 transition shadow-lg">
                            CREATE ACCOUNT
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="flex items-center my-4">
                        <div class="flex-1 border-t border-gray-300"></div>
                        <span class="px-2 text-xs text-gray-500 font-bold">OR</span>
                        <div class="flex-1 border-t border-gray-300"></div>
                    </div>

                    <!-- Login Link -->
                    <p class="text-center text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-red-600 font-bold hover:text-red-700">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <i
                            class="fas fa-hospital text-3xl text-yellow-400"></i>
                        <h4
                            class="text-xl font-bold tracking-tighter">LUMC</h4>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed mb-6">
                        A center of excellence in healthcare, training, and
                        research in Northern Philippines. Dedicated to
                        providing competent, affordable, and compassionate
                        care.
                    </p>
                </div>

                <div>
                    <h4
                        class="font-bold text-lg mb-6 border-l-4 border-red-600 pl-4">Contact
                        Info</h4>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start gap-3">
                            <i
                                class="fas fa-map-pin text-yellow-400 w-6 flex-shrink-0 pt-1"></i>
                            <span>Barangay Nazareno, Agoo, La Union,
                                2504</span>
                        </li>

                        <li class="flex items-start gap-3">
                            <i
                                class="fas fa-phone-alt text-yellow-400 w-6 flex-shrink-0 pt-1"></i>
                            <span>(072) 607-5541 | (072) 607-5939</span>
                        </li>

                        <li class="flex items-start gap-3">
                            <i
                                class="fas fa-envelope text-yellow-400 w-6 flex-shrink-0 pt-1"></i>
                            <span>pglu_lumc@launion.gov.ph</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4
                        class="font-bold text-lg mb-6 border-l-4 border-red-600 pl-4">Governing
                        Body</h4>
                    <p class="text-sm text-gray-400 mb-4">Board of
                        Trustees
                        Chaired by the Incumbent Governor of La
                        Union.</p>
                    <div
                        class="bg-white/5 p-4 rounded-lg border border-white/10">
                        <p
                            class="text-[10px] text-yellow-400 uppercase font-black tracking-widest italic mb-1">Agkaysa!</p>
                        <p class="text-xs font-bold">Province of La
                            Union</p>
                    </div>
                </div>
            </div>

            <div
                class="border-t border-white/10 pt-8 text-center text-[10px] text-gray-500 font-bold tracking-widest uppercase">
                &copy; 2024 La Union Medical Center | Official Portal |
                Bagong Pilipinas
            </div>
        </div>
    </footer>

</body>

</html>
