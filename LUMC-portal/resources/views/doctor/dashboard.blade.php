<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - LUMC Patient Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Top Navigation -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="logo" class="w-12 h-12">
                <h1 class="text-xl font-bold text-blue-900">LUMC - Doctor Portal</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="text-right">
                    <p class="font-bold text-blue-900">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-600">Doctor ID: {{ auth()->user()->email }}</p>
                </div>

                <div class="w-12 h-12 bg-blue-900 text-white rounded-full flex items-center justify-center">
                    <i class="fas fa-user-md text-xl"></i>
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
        <aside class="w-64 bg-white shadow-lg min-h-screen">
            <nav class="p-6 space-y-4">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-900 text-white rounded-lg">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-calendar"></i>
                    <span>Appointments</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-users"></i>
                    <span>My Patients</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-flask"></i>
                    <span>Lab Results</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-x-ray"></i>
                    <span>Radiology</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-pills"></i>
                    <span>Prescriptions</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-bell"></i>
                    <span>Alerts</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">

            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 text-white p-8 rounded-lg mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold mb-2">Welcome Back, Dr. {{ auth()->user()->name }}!</h2>
                        <p class="text-blue-100">{{ now()->format('l, F d, Y h:i A') }}</p>
                    </div>
                    <div class="text-5xl opacity-20">
                        <i class="fas fa-stethoscope"></i>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Today's Appointments</p>
                            <p class="text-3xl font-bold text-blue-900">5</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar text-xl text-blue-900"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Waiting Patients</p>
                            <p class="text-3xl font-bold text-red-600">3</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-hourglass-end text-xl text-red-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Pending Results</p>
                            <p class="text-3xl font-bold text-yellow-600">8</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-flask text-xl text-yellow-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Urgent Alerts</p>
                            <p class="text-3xl font-bold text-purple-600">2</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-circle text-xl text-purple-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Today's Appointments -->
            <div class="bg-white rounded-lg shadow mb-8">
                <div class="p-6 border-b">
                    <h3 class="text-xl font-bold text-blue-900">Today's Appointments</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Time</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Patient</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Type</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">09:00 AM</td>
                                <td class="px-6 py-4">Maria Santos (ID: 12345)</td>
                                <td class="px-6 py-4">Follow-up</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Completed</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-800 font-semibold">View Records</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">10:30 AM</td>
                                <td class="px-6 py-4">Juan Dela Cruz (ID: 12346)</td>
                                <td class="px-6 py-4">Consultation</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">In Progress</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-800 font-semibold">View Records</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">02:00 PM</td>
                                <td class="px-6 py-4">Ana Reyes (ID: 12347)</td>
                                <td class="px-6 py-4">Check-up</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Waiting</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-800 font-semibold">View Records</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Urgent Alerts -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6 border-b">
                    <h3 class="text-xl font-bold text-blue-900">
                        <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>Urgent Alerts
                    </h3>
                </div>
                <div class="p-6 space-y-3">
                    <div class="bg-red-50 border-l-4 border-red-600 p-4 rounded">
                        <p class="font-semibold text-red-900">High Blood Pressure- Patient ID 12345</p>
                        <p class="text-sm text-red-700">Last reading: 160/100 mmHg recorded 2 hours ago</p>
                    </div>
                    <div class="bg-yellow-50 border-l-4 border-yellow-600 p-4 rounded">
                        <p class="font-semibold text-yellow-900">Allergy Alert - Patient ID 12347</p>
                        <p class="text-sm text-yellow-700">Patient has documented penicillin allergy. Consider alternatives for treatment.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>