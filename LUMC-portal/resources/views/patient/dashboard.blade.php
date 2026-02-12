<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - LUMC Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%); margin: 0; }
        .sidebar { background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%); box-shadow: 2px 0 10px rgba(0,0,0,.1); }
        .nav-item { transition: all .2s; cursor: pointer; font-size: 16px; padding: 18px 16px; }
        .nav-item:hover { background: rgba(255,255,255,.1); transform: translateX(4px); }
        .nav-item.active { background: rgba(255,255,255,.15); border-left: 4px solid #fbbf24; }
        .card { background: white; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        
        /* Senior-Friendly Styles */
        .big-text { font-size: 18px; line-height: 1.6; }
        .huge-text { font-size: 24px; font-weight: 700; }
        .action-btn { 
            padding: 20px 30px; 
            font-size: 18px; 
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.2s;
            cursor: pointer;
        }
        .action-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,.15); }
        
        /* Large Table Styles */
        table { font-size: 17px; }
        th { padding: 20px 16px !important; font-size: 16px; background: #f1f5f9; }
        td { padding: 20px 16px !important; }
        
        /* Modal */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.6); }
        .modal.show { display: flex; align-items: center; justify-content: center; }
        .modal-content { background: white; padding: 40px; border-radius: 20px; max-width: 800px; width: 90%; box-shadow: 0 20px 60px rgba(0,0,0,.3); animation: slideDown 0.3s; }
        @keyframes slideDown { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        
        .success-msg { background: #10b981; color: white; padding: 20px 24px; border-radius: 12px; margin-bottom: 20px; display: none; font-size: 18px; }
        .success-msg.show { display: flex; align-items: center; gap: 12px; animation: slideDown 0.3s; }
        
        /* Status Badges - Larger */
        .badge { padding: 8px 16px; font-size: 14px; font-weight: 700; border-radius: 8px; }
        
        /* Icon sizes */
        .icon-lg { font-size: 28px; }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside class="sidebar w-72 text-white fixed h-full overflow-y-auto">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/lumc-logo.png') }}" alt="LUMC" class="h-14 w-14">
                    <div>
                        <h2 class="font-black text-xl">LUMC</h2>
                        <p class="text-sm text-white/70">Patient Portal</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-2">
                <div class="nav-item active flex items-center gap-4 rounded-lg" onclick="showTab('dashboard')">
                    <i class="fas fa-home icon-lg"></i><span>Dashboard</span>
                </div>
                <div class="nav-item flex items-center gap-4 rounded-lg" onclick="showTab('appointments')">
                    <i class="fas fa-calendar-alt icon-lg"></i><span>My Appointments</span>
                </div>
                <div class="nav-item flex items-center gap-4 rounded-lg" onclick="showTab('records')">
                    <i class="fas fa-file-medical icon-lg"></i><span>Medical Records</span>
                </div>
                <div class="nav-item flex items-center gap-4 rounded-lg" onclick="showTab('lab-results')">
                    <i class="fas fa-flask icon-lg"></i><span>Lab Results</span>
                </div>
                <div class="nav-item flex items-center gap-4 rounded-lg" onclick="showTab('medications')">
                    <i class="fas fa-pills icon-lg"></i><span>My Medications</span>
                </div>
                <div class="nav-item flex items-center gap-4 rounded-lg" onclick="showTab('billing')">
                    <i class="fas fa-file-invoice-dollar icon-lg"></i><span>Billing</span>
                </div>
                <div class="nav-item flex items-center gap-4 rounded-lg" onclick="showTab('profile')">
                    <i class="fas fa-user icon-lg"></i><span>My Profile</span>
                </div>
            </nav>

            <div class="p-4 border-t border-white/10 mt-auto">
                <a href="{{ route('home') }}" class="nav-item w-full flex items-center gap-4 rounded-lg">
                    <i class="fas fa-sign-out-alt icon-lg"></i><span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72">
            
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="flex items-center justify-between px-8 py-5">
                    <div>
                        <h1 class="text-3xl font-black text-gray-900" id="pageTitle">My Dashboard</h1>
                        <p class="text-lg text-gray-500 mt-1">Maria Clara Santos</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="relative p-3 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-bell text-gray-600 text-2xl"></i>
                            <span class="absolute top-1 right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-900">Maria Santos</p>
                                <p class="text-sm text-gray-500">Patient ID: P-2024-001</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-[#1e40af] to-[#3b82f6] rounded-full flex items-center justify-center text-white font-bold text-xl">
                                MS
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-8">
                
                <!-- Success Message -->
                <div id="successMessage" class="success-msg">
                    <i class="fas fa-check-circle text-3xl"></i>
                    <span id="successText">Action completed successfully!</span>
                </div>

                <!-- TAB 1: Dashboard -->
                <div id="tab-dashboard" class="tab-content active">
                    <!-- Welcome Card -->
                    <div class="card p-8 bg-gradient-to-r from-[#1e40af] to-[#3b82f6] text-white mb-8">
                        <h2 class="text-3xl font-bold mb-3">Welcome back, Maria! 👋</h2>
                        <p class="text-xl text-white/90">Here's your health overview for today</p>
                        <p class="text-lg text-white/80 mt-2">{{ date('l, F d, Y') }}</p>
                    </div>

                    <!-- Quick Stats - Large Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="card p-8 border-l-4 border-blue-500">
                            <div class="text-5xl font-black text-blue-600 mb-3">2</div>
                            <h3 class="text-xl font-bold text-gray-900">Upcoming Appointments</h3>
                            <p class="text-gray-500 mt-2">Next: Feb 15, 2024</p>
                        </div>

                        <div class="card p-8 border-l-4 border-green-500">
                            <div class="text-5xl font-black text-green-600 mb-3">1</div>
                            <h3 class="text-xl font-bold text-gray-900">New Lab Results</h3>
                            <p class="text-gray-500 mt-2">CBC - Ready to view</p>
                        </div>

                        <div class="card p-8 border-l-4 border-yellow-500">
                            <div class="text-5xl font-black text-yellow-600 mb-3">2</div>
                            <h3 class="text-xl font-bold text-gray-900">Active Medications</h3>
                            <p class="text-gray-500 mt-2">Daily prescriptions</p>
                        </div>

                        <div class="card p-8 border-l-4 border-green-500">
                            <div class="text-5xl font-black text-green-600 mb-3">₱0</div>
                            <h3 class="text-xl font-bold text-gray-900">Balance</h3>
                            <p class="text-green-600 mt-2 font-semibold">Fully Paid</p>
                        </div>
                    </div>

                    <!-- Quick Action Buttons -->
                    <div class="grid md:grid-cols-3 gap-6">
                        <button onclick="showTab('appointments')" class="action-btn bg-gradient-to-r from-blue-600 to-blue-700 text-white hover:shadow-xl flex items-center justify-center gap-3">
                            <i class="fas fa-calendar-plus text-2xl"></i>
                            <span>Book Appointment</span>
                        </button>
                        
                        <button onclick="showTab('lab-results')" class="action-btn bg-gradient-to-r from-green-600 to-green-700 text-white hover:shadow-xl flex items-center justify-center gap-3">
                            <i class="fas fa-flask text-2xl"></i>
                            <span>View Lab Results</span>
                        </button>
                        
                        <button onclick="showTab('records')" class="action-btn bg-gradient-to-r from-purple-600 to-purple-700 text-white hover:shadow-xl flex items-center justify-center gap-3">
                            <i class="fas fa-download text-2xl"></i>
                            <span>Download Records</span>
                        </button>
                    </div>
                </div>

                <!-- TAB 2: My Appointments -->
                <div id="tab-appointments" class="tab-content">
                    <div class="card p-8">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-3xl font-bold text-gray-900">My Appointments</h3>
                            <button onclick="bookAppointment()" class="action-btn bg-gradient-to-r from-blue-600 to-blue-700 text-white flex items-center gap-3">
                                <i class="fas fa-plus"></i> Book New Appointment
                            </button>
                        </div>

                        <!-- Appointments Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-300">
                                        <th class="text-left font-bold text-gray-900">DATE & TIME</th>
                                        <th class="text-left font-bold text-gray-900">DOCTOR</th>
                                        <th class="text-left font-bold text-gray-900">DEPARTMENT</th>
                                        <th class="text-left font-bold text-gray-900">STATUS</th>
                                        <th class="text-left font-bold text-gray-900">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-200 hover:bg-blue-50">
                                        <td>
                                            <div class="font-bold text-gray-900">February 15, 2024</div>
                                            <div class="text-gray-600">10:00 AM</div>
                                        </td>
                                        <td>
                                            <div class="font-bold text-gray-900">Dr. Ricardo Santos</div>
                                            <div class="text-gray-600">Internal Medicine</div>
                                        </td>
                                        <td><span class="text-gray-900">General Checkup</span></td>
                                        <td><span class="badge bg-green-100 text-green-800">Confirmed</span></td>
                                        <td>
                                            <button onclick="viewAppointment('Feb 15, 2024', '10:00 AM', 'Dr. Ricardo Santos', 'Internal Medicine', 'General Checkup', 'OPD Building, 2nd Floor')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-200 hover:bg-blue-50">
                                        <td>
                                            <div class="font-bold text-gray-900">February 22, 2024</div>
                                            <div class="text-gray-600">2:30 PM</div>
                                        </td>
                                        <td>
                                            <div class="font-bold text-gray-900">Dr. Carmen Aguilar</div>
                                            <div class="text-gray-600">Cardiology</div>
                                        </td>
                                        <td><span class="text-gray-900">Follow-up</span></td>
                                        <td><span class="badge bg-blue-100 text-blue-800">Scheduled</span></td>
                                        <td>
                                            <button onclick="viewAppointment('Feb 22, 2024', '2:30 PM', 'Dr. Carmen Aguilar', 'Cardiology', 'Follow-up Consultation', 'Cardiology Clinic')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-200 hover:bg-gray-50 opacity-60">
                                        <td>
                                            <div class="font-bold text-gray-900">January 28, 2024</div>
                                            <div class="text-gray-600">10:00 AM</div>
                                        </td>
                                        <td>
                                            <div class="font-bold text-gray-900">Dr. Ricardo Santos</div>
                                            <div class="text-gray-600">Internal Medicine</div>
                                        </td>
                                        <td><span class="text-gray-900">General Checkup</span></td>
                                        <td><span class="badge bg-gray-200 text-gray-800">Completed</span></td>
                                        <td>
                                            <button onclick="viewAppointment('Jan 28, 2024', '10:00 AM', 'Dr. Ricardo Santos', 'Internal Medicine', 'General Checkup', 'OPD Building, 2nd Floor')" class="px-6 py-3 bg-gray-300 text-gray-700 font-bold rounded-lg hover:bg-gray-400">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: Medical Records -->
                <div id="tab-records" class="tab-content">
                    <div class="card p-8">
                        <h3 class="text-3xl font-bold text-gray-900 mb-8">My Medical Records</h3>

                        <div class="space-y-4">
                            <!-- Record 1 -->
                            <div class="card p-6 border-2 border-gray-200 hover:border-blue-500 hover:shadow-lg transition">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-file-medical text-blue-600 text-3xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-2xl font-bold text-gray-900 mb-2">General Checkup Report</h4>
                                        <p class="text-lg text-gray-600">Dr. Ricardo Santos | January 28, 2024</p>
                                        <p class="text-gray-500 mt-2">Complete physical examination and health assessment</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <button onclick="viewRecord('General Checkup Report', 'Dr. Ricardo Santos', 'January 28, 2024', 'Patient is in good overall health. Blood pressure slightly elevated at 130/85. Recommend lifestyle modifications and follow-up in 3 months.')" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-lg">
                                            <i class="fas fa-eye mr-2"></i> View
                                        </button>
                                        <button onclick="downloadRecord('General Checkup Report')" class="px-8 py-4 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 text-lg">
                                            <i class="fas fa-download mr-2"></i> Download
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Record 2 -->
                            <div class="card p-6 border-2 border-gray-200 hover:border-blue-500 hover:shadow-lg transition">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-heartbeat text-green-600 text-3xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-2xl font-bold text-gray-900 mb-2">ECG Results</h4>
                                        <p class="text-lg text-gray-600">Dr. Carmen Aguilar | January 15, 2024</p>
                                        <p class="text-gray-500 mt-2">Electrocardiogram test results</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <button onclick="viewRecord('ECG Results', 'Dr. Carmen Aguilar', 'January 15, 2024', 'ECG shows normal sinus rhythm. Heart rate: 72 bpm. No abnormalities detected. Patient advised to continue current medications.')" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-lg">
                                            <i class="fas fa-eye mr-2"></i> View
                                        </button>
                                        <button onclick="downloadRecord('ECG Results')" class="px-8 py-4 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 text-lg">
                                            <i class="fas fa-download mr-2"></i> Download
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Record 3 -->
                            <div class="card p-6 border-2 border-gray-200 hover:border-blue-500 hover:shadow-lg transition">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-x-ray text-red-600 text-3xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-2xl font-bold text-gray-900 mb-2">Chest X-Ray</h4>
                                        <p class="text-lg text-gray-600">Dr. Ricardo Santos | December 10, 2023</p>
                                        <p class="text-gray-500 mt-2">Routine chest radiograph examination</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <button onclick="viewRecord('Chest X-Ray', 'Dr. Ricardo Santos', 'December 10, 2023', 'Chest X-ray shows clear lung fields bilaterally. No signs of infiltrates, masses, or effusions. Heart size normal. No acute findings.')" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-lg">
                                            <i class="fas fa-eye mr-2"></i> View
                                        </button>
                                        <button onclick="downloadRecord('Chest X-Ray')" class="px-8 py-4 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 text-lg">
                                            <i class="fas fa-download mr-2"></i> Download
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: Lab Results -->
                <div id="tab-lab-results" class="tab-content">
                    <div class="card p-8">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-3xl font-bold text-gray-900">My Lab Results</h3>
                            <span class="badge bg-green-100 text-green-800 text-xl px-6 py-3">1 New Result Available</span>
                        </div>

                        <div class="space-y-4">
                            <!-- Lab Result 1 - NEW -->
                            <div class="card p-6 border-2 border-green-500 bg-green-50">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-flask text-green-600 text-3xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h4 class="text-2xl font-bold text-gray-900">Complete Blood Count (CBC)</h4>
                                            <span class="badge bg-green-600 text-white">NEW</span>
                                        </div>
                                        <p class="text-lg text-gray-600 mb-2">Collected: February 10, 2024 | Released: February 11, 2024</p>
                                        <p class="text-gray-700 font-semibold">Status: Results Ready</p>
                                    </div>
                                    <button onclick="viewLabResult('Complete Blood Count (CBC)', 'Feb 10, 2024', 'Feb 11, 2024', 'Dr. Ricardo Santos')" class="px-8 py-4 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 text-lg">
                                        <i class="fas fa-eye mr-2"></i> View Results
                                    </button>
                                </div>
                            </div>

                            <!-- Lab Result 2 -->
                            <div class="card p-6 border-2 border-gray-200 hover:border-blue-500 hover:shadow-lg transition">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-vial text-blue-600 text-3xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-2xl font-bold text-gray-900 mb-2">Blood Chemistry</h4>
                                        <p class="text-lg text-gray-600 mb-2">Collected: January 20, 2024 | Released: January 22, 2024</p>
                                        <p class="text-gray-700 font-semibold">Glucose, Cholesterol, Creatinine</p>
                                    </div>
                                    <button onclick="viewLabResult('Blood Chemistry', 'Jan 20, 2024', 'Jan 22, 2024', 'Dr. Ricardo Santos')" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-lg">
                                        <i class="fas fa-eye mr-2"></i> View Results
                                    </button>
                                </div>
                            </div>

                            <!-- Lab Result 3 -->
                            <div class="card p-6 border-2 border-gray-200 hover:border-blue-500 hover:shadow-lg transition">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-microscope text-purple-600 text-3xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-2xl font-bold text-gray-900 mb-2">Urinalysis</h4>
                                        <p class="text-lg text-gray-600 mb-2">Collected: January 15, 2024 | Released: January 16, 2024</p>
                                        <p class="text-gray-700 font-semibold">Complete urinalysis examination</p>
                                    </div>
                                    <button onclick="viewLabResult('Urinalysis', 'Jan 15, 2024', 'Jan 16, 2024', 'Dr. Ricardo Santos')" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-lg">
                                        <i class="fas fa-eye mr-2"></i> View Results
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 5: My Medications -->
                <div id="tab-medications" class="tab-content">
                    <div class="card p-8">
                        <h3 class="text-3xl font-bold text-gray-900 mb-8">My Current Medications</h3>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-300">
                                        <th class="text-left font-bold text-gray-900">MEDICATION</th>
                                        <th class="text-left font-bold text-gray-900">DOSAGE</th>
                                        <th class="text-left font-bold text-gray-900">FREQUENCY</th>
                                        <th class="text-left font-bold text-gray-900">PRESCRIBED BY</th>
                                        <th class="text-left font-bold text-gray-900">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-200 hover:bg-green-50">
                                        <td>
                                            <div class="flex items-center gap-4">
                                                <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-pills text-green-600 text-2xl"></i>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-gray-900 text-lg">Losartan</div>
                                                    <div class="text-gray-600">For hypertension</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="text-gray-900 text-lg font-semibold">50mg</span></td>
                                        <td><span class="text-gray-900 text-lg">Once daily (Morning)</span></td>
                                        <td><span class="text-gray-900 text-lg">Dr. Ricardo Santos</span></td>
                                        <td><span class="badge bg-green-100 text-green-800">Active</span></td>
                                    </tr>

                                    <tr class="border-b border-gray-200 hover:bg-green-50">
                                        <td>
                                            <div class="flex items-center gap-4">
                                                <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-tablets text-blue-600 text-2xl"></i>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-gray-900 text-lg">Metformin</div>
                                                    <div class="text-gray-600">For diabetes</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="text-gray-900 text-lg font-semibold">500mg</span></td>
                                        <td><span class="text-gray-900 text-lg">Twice daily (After meals)</span></td>
                                        <td><span class="text-gray-900 text-lg">Dr. Ricardo Santos</span></td>
                                        <td><span class="badge bg-green-100 text-green-800">Active</span></td>
                                    </tr>

                                    <tr class="border-b border-gray-200 hover:bg-gray-50 opacity-60">
                                        <td>
                                            <div class="flex items-center gap-4">
                                                <div class="w-14 h-14 bg-gray-100 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-capsules text-gray-600 text-2xl"></i>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-gray-900 text-lg">Amoxicillin</div>
                                                    <div class="text-gray-600">Antibiotic</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="text-gray-900 text-lg font-semibold">500mg</span></td>
                                        <td><span class="text-gray-900 text-lg">3x daily (7 days)</span></td>
                                        <td><span class="text-gray-900 text-lg">Dr. Ricardo Santos</span></td>
                                        <td><span class="badge bg-gray-200 text-gray-800">Completed</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Medication Reminders -->
                        <div class="mt-8 p-6 bg-yellow-50 border-2 border-yellow-500 rounded-xl">
                            <div class="flex items-start gap-4">
                                <i class="fas fa-bell text-yellow-600 text-3xl"></i>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Important Reminders</h4>
                                    <ul class="space-y-2 text-lg text-gray-700">
                                        <li>• Take Losartan every morning with water</li>
                                        <li>• Take Metformin after breakfast and dinner</li>
                                        <li>• Do not skip doses - set alarm reminders</li>
                                        <li>• Report any side effects to your doctor immediately</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 6: Billing -->
                <div id="tab-billing" class="tab-content">
                    <div class="card p-8">
                        <h3 class="text-3xl font-bold text-gray-900 mb-8">My Billing Information</h3>

                        <!-- Balance Overview -->
                        <div class="grid md:grid-cols-2 gap-6 mb-8">
                            <div class="card p-8 bg-gradient-to-br from-green-500 to-green-600 text-white">
                                <h4 class="text-xl font-bold mb-3">Current Balance</h4>
                                <div class="text-5xl font-black mb-2">₱0.00</div>
                                <p class="text-xl text-white/90">All bills paid</p>
                            </div>

                            <div class="card p-8 border-2 border-blue-500">
                                <h4 class="text-xl font-bold text-gray-900 mb-3">Total Paid (2024)</h4>
                                <div class="text-5xl font-black text-blue-600 mb-2">₱18,750</div>
                                <p class="text-xl text-gray-600">3 transactions</p>
                            </div>
                        </div>

                        <!-- Billing History -->
                        <h4 class="text-2xl font-bold text-gray-900 mb-6">Billing History</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-300">
                                        <th class="text-left font-bold text-gray-900">INVOICE #</th>
                                        <th class="text-left font-bold text-gray-900">DATE</th>
                                        <th class="text-left font-bold text-gray-900">DESCRIPTION</th>
                                        <th class="text-left font-bold text-gray-900">AMOUNT</th>
                                        <th class="text-left font-bold text-gray-900">STATUS</th>
                                        <th class="text-left font-bold text-gray-900">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-200 hover:bg-green-50">
                                        <td><span class="font-bold text-gray-900">INV-2024-003</span></td>
                                        <td><span class="text-gray-900">Feb 01, 2024</span></td>
                                        <td><span class="text-gray-900">Laboratory Tests (CBC, Chemistry)</span></td>
                                        <td><span class="text-gray-900 font-bold text-lg">₱3,250</span></td>
                                        <td><span class="badge bg-green-100 text-green-800">Paid</span></td>
                                        <td>
                                            <button onclick="viewInvoice('INV-2024-003', 'Feb 01, 2024', '₱3,250', 'Paid')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                                                View Receipt
                                            </button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-200 hover:bg-green-50">
                                        <td><span class="font-bold text-gray-900">INV-2024-002</span></td>
                                        <td><span class="text-gray-900">Jan 28, 2024</span></td>
                                        <td><span class="text-gray-900">General Checkup & Consultation</span></td>
                                        <td><span class="text-gray-900 font-bold text-lg">₱2,500</span></td>
                                        <td><span class="badge bg-green-100 text-green-800">Paid</span></td>
                                        <td>
                                            <button onclick="viewInvoice('INV-2024-002', 'Jan 28, 2024', '₱2,500', 'Paid')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                                                View Receipt
                                            </button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-200 hover:bg-green-50">
                                        <td><span class="font-bold text-gray-900">INV-2024-001</span></td>
                                        <td><span class="text-gray-900">Jan 15, 2024</span></td>
                                        <td><span class="text-gray-900">ECG Test & Cardiology Consultation</span></td>
                                        <td><span class="text-gray-900 font-bold text-lg">₱13,000</span></td>
                                        <td><span class="badge bg-green-100 text-green-800">Paid</span></td>
                                        <td>
                                            <button onclick="viewInvoice('INV-2024-001', 'Jan 15, 2024', '₱13,000', 'Paid')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                                                View Receipt
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: My Profile -->
                <div id="tab-profile" class="tab-content">
                    <div class="card p-8">
                        <h3 class="text-3xl font-bold text-gray-900 mb-8">My Profile Information</h3>

                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Personal Information -->
                            <div>
                                <h4 class="text-2xl font-bold text-gray-900 mb-6">Personal Information</h4>
                                <div class="space-y-5">
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Full Name</p>
                                        <p class="text-xl font-bold text-gray-900">Maria Clara Santos</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Patient ID</p>
                                        <p class="text-xl font-bold text-gray-900">P-2024-001</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Date of Birth</p>
                                        <p class="text-xl font-bold text-gray-900">May 15, 1990</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Gender</p>
                                        <p class="text-xl font-bold text-gray-900">Female</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Phone Number</p>
                                        <p class="text-xl font-bold text-gray-900">09171234567</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Email</p>
                                        <p class="text-xl font-bold text-gray-900">maria.santos@email.com</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Address</p>
                                        <p class="text-xl font-bold text-gray-900">Brgy. San Nicolas, Agoo, La Union</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Health Information -->
                            <div>
                                <h4 class="text-2xl font-bold text-gray-900 mb-6">Health Information</h4>
                                <div class="space-y-5">
                                    <div class="p-5 bg-red-50 border-2 border-red-500 rounded-lg">
                                        <p class="text-sm text-red-600 font-bold mb-1">Blood Type</p>
                                        <p class="text-3xl font-black text-red-900">O+</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Height</p>
                                        <p class="text-xl font-bold text-gray-900">165 cm</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Weight</p>
                                        <p class="text-xl font-bold text-gray-900">58 kg</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">BMI</p>
                                        <p class="text-xl font-bold text-green-600">21.3 (Normal)</p>
                                    </div>
                                    <div class="p-5 bg-yellow-50 border-2 border-yellow-500 rounded-lg">
                                        <p class="text-sm text-yellow-700 font-bold mb-2">Allergies</p>
                                        <p class="text-xl font-bold text-yellow-900">Penicillin</p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-500 mb-1">Emergency Contact</p>
                                        <p class="text-xl font-bold text-gray-900">Juan Santos</p>
                                        <p class="text-lg text-gray-600">09181234567</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex gap-4">
                            <button onclick="editProfile()" class="action-btn bg-gradient-to-r from-blue-600 to-blue-700 text-white flex-1">
                                <i class="fas fa-edit mr-2"></i> Edit Profile
                            </button>
                            <button onclick="changePassword()" class="action-btn bg-gradient-to-r from-gray-600 to-gray-700 text-white flex-1">
                                <i class="fas fa-key mr-2"></i> Change Password
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Details Modal -->
    <div id="detailsModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-3xl font-bold text-gray-900" id="modalTitle">Details</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-3xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div id="modalContent" class="text-lg"></div>
            
            <button onclick="closeModal()" class="mt-8 w-full action-btn bg-gray-300 text-gray-700 hover:bg-gray-400">
                Close
            </button>
        </div>
    </div>

    <script>
        // Tab Navigation
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
            
            document.getElementById('tab-' + tabName).classList.add('active');
            event.target.closest('.nav-item').classList.add('active');
            
            const titles = {
                'dashboard': 'My Dashboard',
                'appointments': 'My Appointments',
                'records': 'Medical Records',
                'lab-results': 'Lab Results',
                'medications': 'My Medications',
                'billing': 'Billing Information',
                'profile': 'My Profile'
            };
            document.getElementById('pageTitle').textContent = titles[tabName];
            window.scrollTo(0, 0);
        }

        // Success Message
        function showSuccess(message) {
            const successMsg = document.getElementById('successMessage');
            document.getElementById('successText').textContent = message;
            successMsg.classList.add('show');
            setTimeout(() => successMsg.classList.remove('show'), 5000);
        }

        // View Appointment Details
        function viewAppointment(date, time, doctor, dept, type, location) {
            document.getElementById('modalTitle').textContent = 'Appointment Details';
            document.getElementById('modalContent').innerHTML = `
                <div class="space-y-4">
                    <div class="p-5 bg-blue-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Date & Time</p>
                        <p class="text-2xl font-bold text-gray-900">${date} at ${time}</p>
                    </div>
                    <div class="p-5 bg-gray-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Doctor</p>
                        <p class="text-2xl font-bold text-gray-900">${doctor}</p>
                        <p class="text-lg text-gray-600">${dept}</p>
                    </div>
                    <div class="p-5 bg-gray-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Type</p>
                        <p class="text-xl font-bold text-gray-900">${type}</p>
                    </div>
                    <div class="p-5 bg-gray-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Location</p>
                        <p class="text-xl font-bold text-gray-900">${location}</p>
                    </div>
                </div>
            `;
            document.getElementById('detailsModal').classList.add('show');
        }

        // View Medical Record
        function viewRecord(title, doctor, date, content) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalContent').innerHTML = `
                <div class="space-y-4">
                    <div class="p-5 bg-blue-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Doctor</p>
                        <p class="text-xl font-bold text-gray-900">${doctor}</p>
                    </div>
                    <div class="p-5 bg-gray-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Date</p>
                        <p class="text-xl font-bold text-gray-900">${date}</p>
                    </div>
                    <div class="p-5 bg-gray-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Details</p>
                        <p class="text-lg text-gray-900 leading-relaxed">${content}</p>
                    </div>
                </div>
            `;
            document.getElementById('detailsModal').classList.add('show');
        }

        // View Lab Result
        function viewLabResult(test, collected, released, doctor) {
            document.getElementById('modalTitle').textContent = test + ' Results';
            document.getElementById('modalContent').innerHTML = `
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-5 bg-blue-50 rounded-lg">
                            <p class="text-gray-600 mb-2">Collected</p>
                            <p class="text-xl font-bold text-gray-900">${collected}</p>
                        </div>
                        <div class="p-5 bg-green-50 rounded-lg">
                            <p class="text-gray-600 mb-2">Released</p>
                            <p class="text-xl font-bold text-gray-900">${released}</p>
                        </div>
                    </div>
                    <div class="p-5 bg-gray-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Ordered by</p>
                        <p class="text-xl font-bold text-gray-900">${doctor}</p>
                    </div>
                    <div class="p-5 bg-green-50 border-2 border-green-500 rounded-lg">
                        <p class="text-green-700 font-bold mb-3 text-xl">Test Results</p>
                        <div class="space-y-3 text-lg">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Hemoglobin:</span>
                                <span class="font-bold text-gray-900">13.5 g/dL <span class="text-green-600">(Normal)</span></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">WBC Count:</span>
                                <span class="font-bold text-gray-900">7,200/μL <span class="text-green-600">(Normal)</span></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Platelet Count:</span>
                                <span class="font-bold text-gray-900">250,000/μL <span class="text-green-600">(Normal)</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('detailsModal').classList.add('show');
        }

        // View Invoice
        function viewInvoice(invoice, date, amount, status) {
            document.getElementById('modalTitle').textContent = 'Invoice ' + invoice;
            document.getElementById('modalContent').innerHTML = `
                <div class="space-y-4">
                    <div class="p-5 bg-blue-50 rounded-lg">
                        <p class="text-gray-600 mb-2">Invoice Number</p>
                        <p class="text-2xl font-bold text-gray-900">${invoice}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-5 bg-gray-50 rounded-lg">
                            <p class="text-gray-600 mb-2">Date</p>
                            <p class="text-xl font-bold text-gray-900">${date}</p>
                        </div>
                        <div class="p-5 bg-green-50 rounded-lg">
                            <p class="text-gray-600 mb-2">Status</p>
                            <p class="text-xl font-bold text-green-600">${status}</p>
                        </div>
                    </div>
                    <div class="p-5 bg-green-100 rounded-lg">
                        <p class="text-gray-600 mb-2">Total Amount</p>
                        <p class="text-3xl font-black text-green-900">${amount}</p>
                    </div>
                    <button onclick="downloadInvoice('${invoice}')" class="action-btn bg-green-600 text-white w-full">
                        <i class="fas fa-download mr-2"></i> Download Receipt
                    </button>
                </div>
            `;
            document.getElementById('detailsModal').classList.add('show');
        }

        // Download Functions
        function downloadRecord(title) {
            showSuccess('Downloading ' + title + '...');
        }

        function downloadInvoice(invoice) {
            showSuccess('Downloading invoice ' + invoice + '...');
        }

        // Other Actions
        function bookAppointment() {
            showSuccess('Opening appointment booking form...');
        }

        function editProfile() {
            showSuccess('Opening profile editor...');
        }

        function changePassword() {
            showSuccess('Opening password change form...');
        }

        // Modal Functions
        function closeModal() {
            document.getElementById('detailsModal').classList.remove('show');
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('show');
            }
        }
    </script>
</body>
</html>