<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Union Medical Center | Official Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet">
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
            background: linear-gradient(135deg, rgba(26, 58, 138, 0.9) 0%, rgba(30, 64, 175, 0.7) 100%);
        }

        .agkaysa-font {
            font-style: italic;
            font-weight: 800;
        }

        .bg-gold {
            background-color: #facc15;
        }

        .text-lu-blue {
            color: #1a3a8a;
        }
    </style>
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
                <a href="#home"
                    class="text-blue-900 hover:text-red-600 transition">HOME</a>
                <a href="#about"
                    class="text-blue-900 hover:text-red-600 transition">ABOUT</a>
                <a href="#mission"
                    class="text-blue-900 hover:text-red-600 transition">MISSION
                    & VISION</a>
                <a href="#services"
                    class="text-blue-900 hover:text-red-600 transition">DEPARTMENTS</a>
                <a href="#contact"
                    class="text-blue-900 hover:text-red-600 transition">CONTACT</a>
                <button onclick="openLoginModal()"
                    class="bg-red-600 text-white px-5 py-2 rounded-md hover:bg-blue-900 transition shadow-lg">LOGIN</button>
            </nav>

            <button class="lg:hidden text-2xl text-blue-900">
                <i class="fas fa-bars"></i>
            </button>

            <img src="{{ asset('images/BagongPilipinas.png') }}"
                alt="logo" class="w-16 h-16">
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home"
        class="relative min-h-[500px] flex items-center text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div
                class="w-full h-full bg-slate-900 flex items-center justify-center opacity-50">
                <i
                    class="fas fa-clinic-medical text-[20rem] text-white/10"></i>
            </div>
            <div class="absolute inset-0 hero-gradient"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl space-y-6">
                <div
                    class="inline-flex items-center bg-white/20 backdrop-blur-md px-4 py-1 rounded-full border border-white/30 text-xs font-bold tracking-widest uppercase">
                    <span class="text-yellow-400 mr-2">●</span> Established
                    April 08, 2002
                </div>
                <h2 class="text-4xl md:text-6xl font-black leading-tight">
                    Level 2 Tertiary <br /><span
                        class="text-yellow-400">Provincial Hospital</span>
                </h2>
                <p class="text-lg opacity-90 max-w-xl leading-relaxed">
                    A P650 million healthcare facility donated by the
                    European Union, serving the people of La Union with the
                    spirit of <span
                        class="agkaysa-font text-red-400">Agkaysa!</span>
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#about"
                        class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-md font-bold transition flex items-center gap-2 shadow-xl">
                        LEARN OUR HISTORY <i class="fas fa-history"></i>
                    </a>
                    <a href="#services"
                        class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-3 rounded-md font-bold transition shadow-xl">
                        VIEW MEDICAL SERVICES <i
                            class="fas fa-stethoscope ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="bg-blue-900 py-8 relative">
        <div class="container mx-auto px-4">
            <div
                class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center border-b border-white/10 pb-8">
                <div>
                    <p
                        class="text-yellow-400 font-bold text-3xl mb-1">100</p>
                    <p
                        class="text-white/70 text-xs uppercase tracking-widest font-bold">Bed
                        Capacity</p>
                </div>
                <div>
                    <p
                        class="text-yellow-400 font-bold text-3xl mb-1">294</p>
                    <p
                        class="text-white/70 text-xs uppercase tracking-widest font-bold">Total
                        Staff</p>
                </div>
                <div>
                    <p
                        class="text-yellow-400 font-bold text-3xl mb-1">628k+</p>
                    <p
                        class="text-white/70 text-xs uppercase tracking-widest font-bold">Patients
                        Served</p>
                </div>
                <div>
                    <p
                        class="text-yellow-400 font-bold text-3xl mb-1">27</p>
                    <p
                        class="text-white/70 text-xs uppercase tracking-widest font-bold">Total
                        Buildings</p>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div
                        class="absolute -top-4 -left-4 w-24 h-24 bg-red-100 -z-10 rounded-full"></div>
                    <h3
                        class="text-sm font-bold text-red-600 tracking-[0.2em] mb-4 uppercase">Legacy
                        of Care</h3>
                    <h2
                        class="text-3xl md:text-4xl font-bold text-blue-900 mb-6">Our
                        Journey & Transformation</h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>Established to replace the earthquake-damaged
                            Doña Gregoria Memorial Hospital, LUMC opened on
                            <strong>April 08, 2002</strong>. It was a
                            landmark gift from the European Union to the
                            province.
                        </p>
                        <p>By March 02, 2005, through <strong>Republic Act
                                9259</strong>, we became the first and only
                            Provincial Hospital in the Philippines converted
                            into a non-stock, non-profit local
                            government-controlled corporation.</p>
                        <p>Under the leadership of the Board of Trustees,
                            chaired by the Provincial Governor, we operate
                            as an economic enterprise dedicated to
                            sustainability and the welfare of over 740,000
                            residents of La Union.</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div
                        class="bg-gray-100 rounded-xl p-8 flex flex-col items-center justify-center text-center">
                        <i
                            class="fas fa-hand-holding-heart text-3xl text-red-600 mb-4"></i>
                        <h4 class="font-bold text-blue-900">48% Charity</h4>
                        <p class="text-xs text-gray-500">Committed to
                            indigent care</p>
                    </div>
                    <div
                        class="bg-blue-900 rounded-xl p-8 flex flex-col items-center justify-center text-center text-white">
                        <i
                            class="fas fa-laptop-medical text-3xl text-yellow-400 mb-4"></i>
                        <h4 class="font-bold">Fully Digital</h4>
                        <p class="text-xs text-white/70">Automated E-NGAS
                            Systems</p>
                    </div>
                    <div
                        class="bg-red-600 rounded-xl p-8 flex flex-col items-center justify-center text-center text-white col-span-2">
                        <p
                            class="text-sm font-bold uppercase tracking-widest italic mb-2">Social
                            Service Classification</p>
                        <h4 class="text-xl font-black">CLASS A TO D</h4>
                        <p class="text-xs text-white/80">Fair healthcare
                            access based on capacity to pay</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section id="mission" class="py-20 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div
                    class="bg-white p-10 rounded-2xl shadow-xl">
                    <div
                        class="w-16 h-16 bg-blue-900 text-white rounded-full flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-eye text-2xl"></i>
                    </div>
                    <h3
                        class="text-2xl font-bold text-blue-900 mb-4 uppercase tracking-tighter">Our
                        Vision</h3>
                    <p class="text-gray-700 leading-relaxed italic">
                        "The La Union Medical Center shall be the center-point for the delivery of quality tertiary medical/surgical care for the people especially in La Union provided in an atmosphere of competent, affordable, compassionate friendly and caring hospital environment."
                    </p>
                </div>
                <div
                    class="bg-white p-10 rounded-2xl shadow-xl">
                    <div
                        class="w-16 h-16 bg-red-600 text-white rounded-full flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-bullseye text-2xl"></i>
                    </div>
                    <h3
                        class="text-2xl font-bold text-blue-900 mb-4 uppercase tracking-tighter">Our
                        Mission</h3>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex gap-3"><i
                                class="fas fa-check-circle text-red-600 mt-1"></i>
                            Comprehensive family medicine with emphasis on
                            preventive and curative care.</li>
                        <li class="flex gap-3"><i
                                class="fas fa-check-circle text-red-600 mt-1"></i>
                            Multi-specialty focus towards diagnostic and
                            specialized therapeutic cases.</li>
                        <li class="flex gap-3"><i
                                class="fas fa-check-circle text-red-600 mt-1"></i>
                            Training center for medical and paramedical
                            health providers.</li>
                        <li class="flex gap-3"><i
                                class="fas fa-check-circle text-red-600 mt-1"></i>
                            Research center for locally based public health
                            concerns.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Departments -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-blue-900 mb-2">Clinical
                    Departments</h2>
                <p
                    class="text-gray-500 uppercase tracking-widest text-sm font-bold">Comprehensive
                    Multi-Specialty Care</p>
                <div class="h-1 w-20 bg-red-600 mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Surgery -->
                <div
                    class="bg-gray-50 p-6 rounded-xl border border-gray-200 hover:border-blue-900 transition-all group">
                    <h4
                        class="font-bold text-blue-900 mb-4 border-b pb-2 group-hover:text-red-600">SURGERY</h4>
                    <ul
                        class="text-xs space-y-2 text-gray-600 font-semibold uppercase">
                        <li>• Orthopedic</li>
                        <li>• Ophthalmology</li>
                        <li>• Otorhinolaryngology</li>
                        <li>• Neuro Surgical</li>
                        <li>• Urology</li>
                        <li>• Thoracic & CV Surgery</li>
                    </ul>
                </div>

                <!-- Internal Medicine -->
                <div
                    class="bg-gray-50 p-6 rounded-xl border border-gray-200 hover:border-blue-900 transition-all group">
                    <h4
                        class="font-bold text-blue-900 mb-4 border-b pb-2 group-hover:text-red-600">INTERNAL
                        MEDICINE</h4>
                    <ul
                        class="text-xs space-y-2 text-gray-600 font-semibold uppercase">
                        <li>• Adult Cardiology</li>
                        <li>• Gastroenterology</li>
                        <li>• Nephrology</li>
                        <li>• Ambulatory Diabetes</li>
                        <li>• DOTS Clinic</li>
                    </ul>
                </div>

                <!-- OB-Gyne -->
                <div
                    class="bg-gray-50 p-6 rounded-xl border border-gray-200 hover:border-blue-900 transition-all group">
                    <h4
                        class="font-bold text-blue-900 mb-4 border-b pb-2 group-hover:text-red-600">OBSTETRICS
                        & GYNECOLOGY</h4>
                    <ul
                        class="text-xs space-y-2 text-gray-600 font-semibold uppercase">
                        <li>• Gynecologic Oncology</li>
                        <li>• Maternity Care</li>
                        <li>• Reproductive Health</li>
                        <li>• Family Planning</li>
                    </ul>
                </div>

                <!-- Pediatrics -->
                <div
                    class="bg-gray-50 p-6 rounded-xl border border-gray-200 hover:border-blue-900 transition-all group">
                    <h4
                        class="font-bold text-blue-900 mb-4 border-b pb-2 group-hover:text-red-600">PEDIATRICS</h4>
                    <ul
                        class="text-xs space-y-2 text-gray-600 font-semibold uppercase">
                        <li>• Pediatric Cardiology</li>
                        <li>• Child Wellness</li>
                        <li>• Immunization</li>
                        <li>• Neonatal Intensive Care</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-slate-900 text-white pt-16 pb-8">
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

    <!-- LOGIN MODAL -->
    <div id="loginModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4 rounded-t-2xl flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Sign In</h3>
                <button onclick="closeLoginModal()" class="text-white text-2xl hover:text-gray-200">
                    &times;
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                        <div class="flex items-center border-b-2 border-gray-300 focus-within:border-red-600">
                            <i class="fas fa-envelope text-gray-500 mr-3"></i>
                            <input type="email" name="email" placeholder="Enter your email" required autofocus
                                class="w-full py-2 bg-transparent outline-none text-gray-800">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                        <div class="flex items-center border-b-2 border-gray-300 focus-within:border-red-600">
                            <i class="fas fa-lock text-gray-500 mr-3"></i>
                            <input type="password" name="password" placeholder="Enter your password" required autocomplete="current-password"
                                class="w-full py-2 bg-transparent outline-none text-gray-800">
                        </div>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="remember" id="rememberMe" class="w-4 h-4 text-red-600 rounded cursor-pointer">
                        <label for="rememberMe" class="ml-2 text-sm text-gray-600 cursor-pointer">Remember me</label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-red-600 text-white font-bold py-3 rounded-lg hover:bg-red-700 transition mb-4 shadow-lg">
                        LOGIN
                    </button>
                </form>

                <!-- Divider -->
                <div class="flex items-center mb-4">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-2 text-xs text-gray-500 font-bold">OR</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <!-- Links Section -->
                <div class="space-y-3 text-center">
                    <div>
                        <p class="text-sm text-gray-600 mb-2">Don't have an account?</p>
                        <a href="{{ route('register') }}" class="inline-block bg-blue-900 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-800 transition w-full text-center">
                            CREATE NEW ACCOUNT
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('password.request') }}" class="text-sm text-red-600 font-bold hover:text-red-700 transition">
                            Forgot your password?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('loginModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeLoginModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLoginModal();
            }
        });
    </script>
</body>

</html>