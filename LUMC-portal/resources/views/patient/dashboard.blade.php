<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - LUMC Patient Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet">
</head>

<body class="bg-gray-50">

    <!-- Top Navigation -->
    <header class="bg-white shadow-md">
        <div class="w-full px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="logo" class="w-12 h-12">
                <h1 class="text-xl font-bold text-blue-900">LUMC - Patient Portal</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="text-right">
                    <p class="font-bold text-blue-900">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-600">Patient ID: {{ auth()->user()->id }}</p>
                </div>

                <div class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-xl"></i>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-600 font-semibold hover:text-red-700">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-t-2 shadow-md min-h-screen">
            <nav class="p-6 space-y-4">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-900 text-white rounded-lg">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-file-medical"></i>
                    <span>Medical Records</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-flask"></i>
                    <span>Lab Results</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-x-ray"></i>
                    <span>X-Ray Reports</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-pills"></i>
                    <span>Prescriptions</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-message"></i>
                    <span>Messages</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-receipt"></i>
                    <span>Bills & Payments</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">

            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 text-white p-8 rounded-lg mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold mb-2">Welcome, {{ auth()->user()->name }}!</h2>
                        <p class="text-blue-100">Your account has been successfully created. {{ now()->format('l, F d, Y') }}</p>
                    </div>
                    <div class="text-5xl opacity-20">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Upcoming Appointments</p>
                            <p class="text-3xl font-bold text-blue-900">2</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar text-xl text-blue-900"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Pending Results</p>
                            <p class="text-3xl font-bold text-yellow-600">1</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-hourglass text-xl text-yellow-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">New Messages</p>
                            <p class="text-3xl font-bold text-purple-600">0</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-xl text-purple-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Outstanding Balance</p>
                            <p class="text-3xl font-bold text-red-600">₱0</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-wallet text-xl text-red-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Upcoming Appointments -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h3 class="text-xl font-bold text-blue-900">Upcoming Appointments</h3>
                    </div>
                    <div class="p-6 space-y-4 ">
                        <div class="border-black border-opacity-10 border rounded-lg shadow-sm pl-4 py-3">
                            <p class="font-semibold text-gray-900">Dr. Ana Reyes - Cardiology</p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>February 12, 2026 - 2:00 PM
                            </p>
                            <div class="mt-3 flex gap-3">
                                <button class="text-sm bg-blue-100 text-blue-900 px-3 py-1 rounded hover:bg-blue-200">Reschedule</button>
                                <button class="text-sm bg-red-100 text-red-900 px-3 py-1 rounded hover:bg-red-200">Cancel</button>
                            </div>
                        </div>

                        <div class="border-black border-opacity-10 border rounded-lg shadow-sm pl-4 py-3">
                            <p class="font-semibold text-gray-900">Dr. Juan Santos - General Check-up</p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2"></i>February 18, 2026 - 10:00 AM
                            </p>
                            <div class="mt-3 flex gap-3">
                                <button class="text-sm bg-blue-100 text-blue-900 px-3 py-1 rounded hover:bg-blue-200">Reschedule</button>
                                <button class="text-sm bg-red-100 text-red-900 px-3 py-1 rounded hover:bg-red-200">Cancel</button>
                            </div>
                        </div>

                        <div class="text-center pt-4 border-t">
                            <button class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800">
                                <i class="fas fa-plus mr-2"></i>Book New Appointment
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Health Summary -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h3 class="text-xl font-bold text-blue-900">Health Summary</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <p class="text-sm text-gray-600 font-semibold mb-1">Blood Type</p>
                            <p class="text-lg font-bold text-blue-900">O+</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 font-semibold mb-1">Last Visit</p>
                            <p class="text-lg font-bold text-blue-900">January 30, 2026</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 font-semibold mb-1">Active Medications</p>
                            <p class="text-lg font-bold text-blue-900">2</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 font-semibold mb-1">Allergies</p>
                            <p class="text-lg font-bold text-red-600">Penicillin</p>
                        </div>

                        <button class="w-full mt-4 bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
                            <i class="fas fa-edit mr-2"></i>Edit Profile
                        </button>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border-l-4 border-blue-900 p-6 mt-8 rounded">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <i class="fas fa-lightbulb"></i> Next Steps
                </h4>
                <ul class="space-y-2 text-gray-700 text-sm">
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Complete your detailed medical profile with history and conditions</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Book your first appointment with a specialist</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Upload any existing medical documents or test results</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Enable SMS/Email notifications for appointment reminders</span>
                    </li>
                </ul>
            </div>

        </main>
    </div>

</body>

</html>