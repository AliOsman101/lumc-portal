<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - LUMC Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(135deg, #f8fafc 0%, #dbeafe 100%); margin: 0; }
        .sidebar { background: linear-gradient(180deg, #16a34a 0%, #22c55e 100%); box-shadow: 2px 0 10px rgba(0,0,0,.1); }
        .nav-item { transition: all .2s; cursor: pointer; }
        .nav-item:hover { background: rgba(255,255,255,.1); transform: translateX(4px); }
        .nav-item.active { background: rgba(255,255,255,.15); border-left: 4px solid #fbbf24; }
        .card { background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        
        /* Modal */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); }
        .modal.show { display: flex; align-items: center; justify-content: center; }
        .modal-content { background: white; padding: 30px; border-radius: 16px; max-width: 700px; width: 90%; box-shadow: 0 20px 60px rgba(0,0,0,.3); animation: slideDown 0.3s; max-height: 90vh; overflow-y: auto; }
        @keyframes slideDown { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        
        /* Form */
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; font-weight: 700; color: #374151; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
        .form-input, .form-select, .form-textarea { width: 100%; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 15px; transition: all 0.2s; }
        .form-input:focus, .form-select:focus, .form-textarea:focus { outline: none; border-color: #16a34a; box-shadow: 0 0 0 3px rgba(22,163,74,0.1); }
        
        .success-msg { background: #10b981; color: white; padding: 16px 20px; border-radius: 8px; margin-bottom: 20px; display: none; }
        .success-msg.show { display: flex; align-items: center; gap: 12px; animation: slideDown 0.3s; }
        
        /* Calendar */
        .calendar { display: grid; grid-template-columns: repeat(7, 1fr); gap: 8px; }
        .calendar-day { padding: 16px; text-align: center; border-radius: 8px; border: 2px solid #e5e7eb; cursor: pointer; transition: all 0.2s; }
        .calendar-day:hover { border-color: #16a34a; background: #f0fdf4; }
        .calendar-day.selected { background: #16a34a; color: white; border-color: #16a34a; }
        .calendar-day.has-schedule { background: #dbeafe; border-color: #3b82f6; }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside class="sidebar w-64 text-white fixed h-full overflow-y-auto">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="LUMC" class="h-12 w-12">
                    <div>
                        <h2 class="font-black text-lg">LUMC</h2>
                        <p class="text-xs text-white/70">Doctor Portal</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-2">
                <div class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('dashboard')">
                    <i class="fas fa-home w-5"></i><span>Dashboard</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('appointments')">
                    <i class="fas fa-calendar-alt w-5"></i><span>My Appointments</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('patients')">
                    <i class="fas fa-users w-5"></i><span>My Patients</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('approvals')">
                    <i class="fas fa-clipboard-check w-5"></i><span>Pending Approvals</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('schedule')">
                    <i class="fas fa-clock w-5"></i><span>My Schedule</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('rotation')">
                    <i class="fas fa-hospital w-5"></i><span>Hospital Rotation</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('prescriptions')">
                    <i class="fas fa-prescription w-5"></i><span>Prescriptions</span>
                </div>
            </nav>

            <div class="p-4 border-t border-white/10 mt-auto">
                <a href="{{ route('home') }}" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold">
                    <i class="fas fa-sign-out-alt w-5"></i><span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="flex items-center justify-between px-8 py-4">
                    <div>
                        <h1 class="text-2xl font-black text-gray-900" id="pageTitle">Doctor Dashboard</h1>
                        <p class="text-sm text-gray-500">Dr. Ricardo Santos - Internal Medicine</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="relative p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-bold text-gray-900">Dr. Ricardo Santos</p>
                                <p class="text-xs text-gray-500">Internal Medicine</p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-[#16a34a] to-[#22c55e] rounded-full flex items-center justify-center text-white font-bold">
                                RS
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-8">
                
                <!-- Success Message -->
                <div id="successMessage" class="success-msg">
                    <i class="fas fa-check-circle text-2xl"></i>
                    <span id="successText">Action completed successfully!</span>
                </div>

                <!-- TAB 1: Dashboard -->
                <div id="tab-dashboard" class="tab-content active">
                    <!-- Welcome Banner -->
                    <div class="card p-6 bg-gradient-to-r from-[#16a34a] to-[#22c55e] text-white mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-2">Welcome, Dr. Santos! 👨‍⚕️</h2>
                                <p class="text-white/90">You have 5 appointments scheduled for today.</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-white/80">{{ date('l') }}</p>
                                <p class="text-lg font-bold">{{ date('F d, Y') }}</p>
                                <p class="text-sm text-white/80">{{ date('h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="card p-6 border-l-4 border-l-blue-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar-day text-blue-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">5</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Today's Appointments</h3>
                            <p class="text-xs text-gray-500 mt-1">Next at 9:00 AM</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-yellow-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-clock text-yellow-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">3</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Waiting Patients</h3>
                            <p class="text-xs text-gray-500 mt-1">In OPD waiting area</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-green-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clipboard-check text-green-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">8</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Pending Approvals</h3>
                            <p class="text-xs text-gray-500 mt-1">Nurse submissions</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-red-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">2</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Urgent Alerts</h3>
                            <p class="text-xs text-gray-500 mt-1">Requires attention</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid md:grid-cols-4 gap-4">
                        <button onclick="showTab('appointments')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-calendar-plus text-blue-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">View Schedule</h4>
                        </button>
                        <button onclick="showTab('approvals')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-clipboard-check text-yellow-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Approvals</h4>
                        </button>
                        <button onclick="showTab('prescriptions')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-prescription text-green-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Prescriptions</h4>
                        </button>
                        <button onclick="showTab('patients')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-users text-purple-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">My Patients</h4>
                        </button>
                    </div>
                </div>

                <!-- TAB 2: My Appointments -->
                <div id="tab-appointments" class="tab-content">
                    <div class="card p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Today's Appointments - {{ date('F d, Y') }}</h3>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-200">
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Time</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Patient</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Type</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Status</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="appointmentsTable">
                                    <tr class="border-b border-gray-100 hover:bg-yellow-50" id="appt-1">
                                        <td class="py-4 px-4 text-sm font-semibold">9:00 AM</td>
                                        <td class="py-4 px-4">
                                            <div class="font-semibold text-gray-900">Maria Clara Santos</div>
                                            <div class="text-xs text-gray-500">ID: P-2024-001</div>
                                        </td>
                                        <td class="py-4 px-4 text-sm text-gray-600">General Checkup</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">Waiting</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="startConsultation('appt-1', 'Maria Clara Santos')" class="px-4 py-2 bg-green-600 text-white text-sm font-bold rounded-lg hover:bg-green-700">
                                                Start Consultation
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 text-sm font-semibold">10:30 AM</td>
                                        <td class="py-4 px-4">
                                            <div class="font-semibold text-gray-900">Jose Rizal Cruz</div>
                                            <div class="text-xs text-gray-500">ID: P-2024-002</div>
                                        </td>
                                        <td class="py-4 px-4 text-sm text-gray-600">Follow-up</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-full">Scheduled</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="viewPatient('Jose Rizal Cruz', 'P-2024-002', 'A+', 'Post-operative Care')" class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 text-sm font-semibold">2:00 PM</td>
                                        <td class="py-4 px-4">
                                            <div class="font-semibold text-gray-900">Ana Reyes Dela Cruz</div>
                                            <div class="text-xs text-gray-500">ID: P-2024-003</div>
                                        </td>
                                        <td class="py-4 px-4 text-sm text-gray-600">Hypertension</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-full">Scheduled</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="viewPatient('Ana Reyes Dela Cruz', 'P-2024-003', 'B+', 'Hypertension Management')" class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 text-sm font-semibold">3:30 PM</td>
                                        <td class="py-4 px-4">
                                            <div class="font-semibold text-gray-900">Pedro Garcia Aquino</div>
                                            <div class="text-xs text-gray-500">ID: P-2024-004</div>
                                        </td>
                                        <td class="py-4 px-4 text-sm text-gray-600">Lab Review</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-full">Scheduled</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="viewPatient('Pedro Garcia Aquino', 'P-2024-004', 'O+', 'Diabetes Follow-up')" class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: My Patients -->
                <div id="tab-patients" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">My Patients (12)</h3>
                            <input type="text" placeholder="Search patients..." class="px-4 py-2 border-2 border-gray-300 rounded-lg focus:border-green-600 focus:outline-none" onkeyup="searchDoctorPatients(this.value)">
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" id="doctorPatientsList">
                            <!-- Patient Card 1 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-green-500 hover:shadow-lg transition cursor-pointer doctor-patient-card" onclick="viewPatient('Maria Clara Santos', 'P-2024-001', 'O+', 'Diabetes Management')">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        MS
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Maria Clara Santos</h4>
                                        <p class="text-xs text-gray-500">ID: P-2024-001</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded">Room 201A</span>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded">Stable</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">Diabetes Management</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Patient Card 2 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-green-500 hover:shadow-lg transition cursor-pointer doctor-patient-card" onclick="viewPatient('Jose Rizal Cruz', 'P-2024-002', 'A+', 'Post-operative Care')">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        JC
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Jose Rizal Cruz</h4>
                                        <p class="text-xs text-gray-500">ID: P-2024-002</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded">Room 203B</span>
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded">Observation</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">Post-operative Care</p>
                                    </div>
                                </div>
                            </div>

                            <!-- More patient cards... -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-green-500 hover:shadow-lg transition cursor-pointer doctor-patient-card" onclick="viewPatient('Ana Reyes Dela Cruz', 'P-2024-003', 'B+', 'Hypertension')">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        AD
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Ana Reyes Dela Cruz</h4>
                                        <p class="text-xs text-gray-500">ID: P-2024-003</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded">Room 205A</span>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded">Stable</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">Hypertension</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: Pending Approvals -->
                <div id="tab-approvals" class="tab-content">
                    <div class="card p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Pending Approvals (8)</h3>

                        <div class="space-y-4" id="approvalsList">
                            <!-- Approval 1 -->
                            <div class="flex items-center gap-4 p-5 bg-yellow-50 border-2 border-yellow-500 rounded-lg" id="approval-1">
                                <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-nurse text-yellow-600 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 mb-1">Patient Admission - Maria Santos</h4>
                                    <p class="text-sm text-gray-600">Submitted by: Nurse Teresa Gomez | 30 mins ago</p>
                                    <p class="text-sm text-gray-700 mt-2"><strong>Reason:</strong> Severe abdominal pain, fever 38.5°C</p>
                                </div>
                                <div class="flex gap-2">
                                    <button onclick="approveSubmission('approval-1', 'Patient Admission for Maria Santos')" class="px-6 py-3 bg-green-600 text-white text-sm font-bold rounded-lg hover:bg-green-700">
                                        <i class="fas fa-check mr-1"></i> Approve
                                    </button>
                                    <button onclick="rejectSubmission('approval-1', 'Patient Admission for Maria Santos')" class="px-6 py-3 bg-red-600 text-white text-sm font-bold rounded-lg hover:bg-red-700">
                                        <i class="fas fa-times mr-1"></i> Reject
                                    </button>
                                </div>
                            </div>

                            <!-- Approval 2 -->
                            <div class="flex items-center gap-4 p-5 bg-yellow-50 border-2 border-yellow-500 rounded-lg" id="approval-2">
                                <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-pills text-yellow-600 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 mb-1">Medication Request - Jose Cruz</h4>
                                    <p class="text-sm text-gray-600">Submitted by: Nurse Ana Reyes | 1 hour ago</p>
                                    <p class="text-sm text-gray-700 mt-2"><strong>Medications:</strong> Amoxicillin 500mg (3x daily), Paracetamol 500mg (as needed)</p>
                                </div>
                                <div class="flex gap-2">
                                    <button onclick="approveSubmission('approval-2', 'Medication Request for Jose Cruz')" class="px-6 py-3 bg-green-600 text-white text-sm font-bold rounded-lg hover:bg-green-700">
                                        <i class="fas fa-check mr-1"></i> Approve
                                    </button>
                                    <button onclick="rejectSubmission('approval-2', 'Medication Request for Jose Cruz')" class="px-6 py-3 bg-red-600 text-white text-sm font-bold rounded-lg hover:bg-red-700">
                                        <i class="fas fa-times mr-1"></i> Reject
                                    </button>
                                </div>
                            </div>

                            <!-- Approval 3 -->
                            <div class="flex items-center gap-4 p-5 bg-yellow-50 border-2 border-yellow-500 rounded-lg" id="approval-3">
                                <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-flask text-yellow-600 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 mb-1">Lab Test Order - Ana Dela Cruz</h4>
                                    <p class="text-sm text-gray-600">Submitted by: Nurse Teresa Gomez | 2 hours ago</p>
                                    <p class="text-sm text-gray-700 mt-2"><strong>Tests:</strong> CBC, Urinalysis, Blood Chemistry</p>
                                </div>
                                <div class="flex gap-2">
                                    <button onclick="approveSubmission('approval-3', 'Lab Test Order for Ana Dela Cruz')" class="px-6 py-3 bg-green-600 text-white text-sm font-bold rounded-lg hover:bg-green-700">
                                        <i class="fas fa-check mr-1"></i> Approve
                                    </button>
                                    <button onclick="rejectSubmission('approval-3', 'Lab Test Order for Ana Dela Cruz')" class="px-6 py-3 bg-red-600 text-white text-sm font-bold rounded-lg hover:bg-red-700">
                                        <i class="fas fa-times mr-1"></i> Reject
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 5: My Schedule -->
                <div id="tab-schedule" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">My Work Schedule</h3>
                            <button onclick="addSchedule()" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                                <i class="fas fa-plus mr-2"></i> Add Schedule
                            </button>
                        </div>

                        <!-- Weekly Schedule Table -->
                        <div class="overflow-x-auto mb-6">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-200">
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Day</th>
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Time</th>
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Location</th>
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Type</th>
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="scheduleTable">
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Monday</td>
                                        <td class="py-4 px-4">8:00 AM - 5:00 PM</td>
                                        <td class="py-4 px-4">LUMC - OPD Building</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Clinic Hours</span></td>
                                        <td class="py-4 px-4">
                                            <button onclick="editScheduleEntry('Monday')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteScheduleEntry('Monday')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Wednesday</td>
                                        <td class="py-4 px-4">8:00 AM - 12:00 PM</td>
                                        <td class="py-4 px-4">LUMC - Main Hospital</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Ward Rounds</span></td>
                                        <td class="py-4 px-4">
                                            <button onclick="editScheduleEntry('Wednesday')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteScheduleEntry('Wednesday')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Friday</td>
                                        <td class="py-4 px-4">2:00 PM - 6:00 PM</td>
                                        <td class="py-4 px-4">LUMC - OPD Building</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Clinic Hours</span></td>
                                        <td class="py-4 px-4">
                                            <button onclick="editScheduleEntry('Friday')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteScheduleEntry('Friday')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 6: Hospital Rotation -->
                <div id="tab-rotation" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Hospital Rotation Schedule</h3>
                            <button onclick="addRotation()" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                                <i class="fas fa-plus mr-2"></i> Add Rotation
                            </button>
                        </div>

                        <!-- Current & Next Rotation -->
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div class="p-6 bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl">
                                <div class="flex items-center gap-3 mb-4">
                                    <i class="fas fa-hospital text-3xl"></i>
                                    <div>
                                        <h4 class="font-bold text-lg">Current Location</h4>
                                        <p class="text-sm text-white/90">Active Assignment</p>
                                    </div>
                                </div>
                                <div class="text-2xl font-black mb-2">La Union Medical Center</div>
                                <p class="text-white/90 mb-1">Main Hospital, Agoo, La Union</p>
                                <p class="text-sm text-white/80">
                                    <i class="fas fa-calendar mr-1"></i> February 1 - 15, 2024
                                </p>
                            </div>

                            <div class="card p-6 border-2 border-blue-500">
                                <div class="flex items-center gap-3 mb-4">
                                    <i class="fas fa-hospital text-blue-600 text-3xl"></i>
                                    <div>
                                        <h4 class="font-bold text-lg text-gray-900">Next Rotation</h4>
                                        <p class="text-sm text-gray-500">Upcoming Assignment</p>
                                    </div>
                                </div>
                                <div class="text-2xl font-black text-gray-900 mb-2">Ilocos Training Hospital</div>
                                <p class="text-gray-600 mb-1">Batac City, Ilocos Norte</p>
                                <p class="text-sm text-gray-500">
                                    <i class="fas fa-calendar mr-1"></i> February 16 - 29, 2024
                                </p>
                            </div>
                        </div>

                        <!-- Rotation History -->
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Rotation History</h4>
                        <div class="space-y-3" id="rotationHistory">
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-hospital text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h5 class="font-bold text-gray-900">La Union Medical Center</h5>
                                    <p class="text-sm text-gray-500">February 1 - 15, 2024</p>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Current</span>
                            </div>

                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-hospital text-purple-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h5 class="font-bold text-gray-900">Divine Word Hospital</h5>
                                    <p class="text-sm text-gray-500">January 15 - 31, 2024</p>
                                </div>
                                <span class="px-3 py-1 bg-gray-200 text-gray-800 text-xs font-bold rounded-full">Completed</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: Prescriptions -->
                <div id="tab-prescriptions" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Recent Prescriptions</h3>
                            <button onclick="writePrescription()" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                                <i class="fas fa-prescription mr-2"></i> Write Prescription
                            </button>
                        </div>

                        <div class="space-y-4">
                            <!-- Prescription 1 -->
                            <div class="card p-5 border-2 border-gray-200 hover:shadow-lg transition">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-prescription text-green-600 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-bold text-gray-900">Maria Clara Santos</h4>
                                            <span class="text-xs text-gray-500">Today, 9:30 AM</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">
                                            <strong>Rx:</strong> Metformin 500mg - 1 tablet twice daily after meals (30 days)
                                        </p>
                                        <p class="text-xs text-gray-500">Diagnosis: Type 2 Diabetes Mellitus</p>
                                    </div>
                                    <button onclick="viewPrescription('Maria Clara Santos', 'Metformin 500mg')" class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700">
                                        View
                                    </button>
                                </div>
                            </div>

                            <!-- Prescription 2 -->
                            <div class="card p-5 border-2 border-gray-200 hover:shadow-lg transition">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-prescription text-blue-600 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-bold text-gray-900">Jose Rizal Cruz</h4>
                                            <span class="text-xs text-gray-500">Yesterday, 3:15 PM</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">
                                            <strong>Rx:</strong> Amoxicillin 500mg - 1 capsule 3x daily (7 days)
                                        </p>
                                        <p class="text-xs text-gray-500">Diagnosis: Upper Respiratory Tract Infection</p>
                                    </div>
                                    <button onclick="viewPrescription('Jose Rizal Cruz', 'Amoxicillin 500mg')" class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700">
                                        View
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Modals -->
    
    <!-- Patient Details Modal -->
    <div id="patientModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Patient Details</h3>
                <button onclick="closeModal('patientModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="patientContent"></div>
            <div class="flex gap-3 mt-6">
                <button onclick="closeModal('patientModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Add Schedule Modal -->
    <div id="scheduleModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Add Schedule</h3>
                <button onclick="closeModal('scheduleModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form onsubmit="saveSchedule(event)">
                <div class="form-group">
                    <label class="form-label">Day of Week</label>
                    <select class="form-select" required>
                        <option value="">Select day...</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label class="form-label">Start Time</label>
                        <input type="time" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">End Time</label>
                        <input type="time" class="form-input" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Location/Hospital</label>
                    <input type="text" class="form-input" placeholder="e.g., LUMC - OPD Building" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Schedule Type</label>
                    <select class="form-select" required>
                        <option value="">Select type...</option>
                        <option value="Clinic Hours">Clinic Hours</option>
                        <option value="Ward Rounds">Ward Rounds</option>
                        <option value="Surgery">Surgery Schedule</option>
                        <option value="Emergency">Emergency Duty</option>
                    </select>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeModal('scheduleModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                        Save Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Rotation Modal -->
    <div id="rotationModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Add Hospital Rotation</h3>
                <button onclick="closeModal('rotationModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form onsubmit="saveRotation(event)">
                <div class="form-group">
                    <label class="form-label">Hospital Name</label>
                    <input type="text" class="form-input" placeholder="e.g., Ilocos Training Hospital" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Location/Address</label>
                    <input type="text" class="form-input" placeholder="e.g., Batac City, Ilocos Norte" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label class="form-label">Start Date</label>
                        <input type="date" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-input" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Notes (Optional)</label>
                    <textarea class="form-input" rows="3" placeholder="Additional information about this rotation..."></textarea>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeModal('rotationModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                        Save Rotation
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Write Prescription Modal -->
    <div id="prescriptionModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Write Prescription</h3>
                <button onclick="closeModal('prescriptionModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form onsubmit="savePrescription(event)">
                <div class="form-group">
                    <label class="form-label">Patient</label>
                    <select class="form-select" required>
                        <option value="">Select patient...</option>
                        <option value="Maria Clara Santos">Maria Clara Santos (P-2024-001)</option>
                        <option value="Jose Rizal Cruz">Jose Rizal Cruz (P-2024-002)</option>
                        <option value="Ana Reyes Dela Cruz">Ana Reyes Dela Cruz (P-2024-003)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Medication Name</label>
                    <input type="text" class="form-input" placeholder="e.g., Amoxicillin" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label class="form-label">Dosage</label>
                        <input type="text" class="form-input" placeholder="e.g., 500mg" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Frequency</label>
                        <input type="text" class="form-input" placeholder="e.g., 3x daily" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Duration</label>
                    <input type="text" class="form-input" placeholder="e.g., 7 days" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Special Instructions</label>
                    <textarea class="form-input" rows="2" placeholder="e.g., Take after meals"></textarea>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeModal('prescriptionModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                        Save Prescription
                    </button>
                </div>
            </form>
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
                'dashboard': 'Doctor Dashboard',
                'appointments': 'My Appointments',
                'patients': 'My Patients',
                'approvals': 'Pending Approvals',
                'schedule': 'My Schedule',
                'rotation': 'Hospital Rotation',
                'prescriptions': 'Prescriptions'
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

        // Start Consultation
        function startConsultation(apptId, patientName) {
            const row = document.getElementById(apptId);
            row.classList.remove('bg-yellow-50');
            row.classList.add('bg-blue-50');
            row.querySelector('span').className = 'px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full';
            row.querySelector('span').textContent = 'In Progress';
            row.querySelector('button').textContent = 'Continue';
            row.querySelector('button').className = 'px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700';
            showSuccess('Consultation started with ' + patientName);
        }

        // View Patient
        function viewPatient(name, id, bloodType, condition) {
            document.getElementById('patientContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b-2 border-gray-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            ${name.split(' ').map(n => n[0]).join('')}
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">${name}</h4>
                            <p class="text-sm text-gray-500">${id} • ${condition}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-3 bg-red-50 border-2 border-red-500 rounded-lg">
                            <p class="text-xs text-red-600 font-bold mb-1">Blood Type</p>
                            <p class="text-2xl font-black text-red-900">${bloodType}</p>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Current Condition</p>
                            <p class="font-bold text-gray-900">${condition}</p>
                        </div>
                    </div>
                    <div class="p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded">
                        <p class="text-xs font-bold text-yellow-600 mb-1">ALLERGIES</p>
                        <p class="font-bold text-yellow-900">Penicillin</p>
                    </div>
                </div>
            `;
            document.getElementById('patientModal').classList.add('show');
        }

        // Approve/Reject Submissions
        function approveSubmission(approvalId, item) {
            const elem = document.getElementById(approvalId);
            elem.classList.remove('bg-yellow-50', 'border-yellow-500');
            elem.classList.add('bg-green-50', 'border-green-500');
            elem.querySelector('i').className = 'fas fa-check-circle text-green-600 text-xl';
            elem.querySelector('.flex.gap-2').innerHTML = '<span class="px-4 py-2 bg-green-100 text-green-800 font-bold rounded-lg">Approved</span>';
            showSuccess(item + ' approved successfully!');
        }

        function rejectSubmission(approvalId, item) {
            const elem = document.getElementById(approvalId);
            elem.classList.remove('bg-yellow-50', 'border-yellow-500');
            elem.classList.add('bg-red-50', 'border-red-500');
            elem.querySelector('i').className = 'fas fa-times-circle text-red-600 text-xl';
            elem.querySelector('.flex.gap-2').innerHTML = '<span class="px-4 py-2 bg-red-100 text-red-800 font-bold rounded-lg">Rejected</span>';
            showSuccess(item + ' rejected.');
        }

        // Search Patients
        function searchDoctorPatients(query) {
            const cards = document.querySelectorAll('.doctor-patient-card');
            cards.forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(query.toLowerCase()) ? 'block' : 'none';
            });
        }

        // Modal Functions
        function addSchedule() {
            document.getElementById('scheduleModal').classList.add('show');
        }

        function saveSchedule(e) {
            e.preventDefault();
            showSuccess('Schedule added successfully!');
            closeModal('scheduleModal');
        }

        function editScheduleEntry(day) {
            showSuccess('Opening schedule editor for ' + day + '...');
        }

        function deleteScheduleEntry(day) {
            if (confirm('Delete schedule for ' + day + '?')) {
                showSuccess('Schedule for ' + day + ' deleted.');
            }
        }

        function addRotation() {
            document.getElementById('rotationModal').classList.add('show');
        }

        function saveRotation(e) {
            e.preventDefault();
            showSuccess('Hospital rotation added successfully!');
            closeModal('rotationModal');
        }

        function writePrescription() {
            document.getElementById('prescriptionModal').classList.add('show');
        }

        function savePrescription(e) {
            e.preventDefault();
            showSuccess('Prescription saved successfully!');
            closeModal('prescriptionModal');
        }

        function viewPrescription(patient, medication) {
            showSuccess('Viewing prescription for ' + patient);
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('show');
            }
        }
    </script>
</body>
</html>