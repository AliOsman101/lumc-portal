<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Dashboard - LUMC Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(135deg, #f8fafc 0%, #fef3c7 100%); margin: 0; }
        .sidebar { background: linear-gradient(180deg, #dc2626 0%, #ef4444 100%); box-shadow: 2px 0 10px rgba(0,0,0,.1); }
        .nav-item { transition: all .2s; cursor: pointer; }
        .nav-item:hover { background: rgba(255,255,255,.1); transform: translateX(4px); }
        .nav-item.active { background: rgba(255,255,255,.15); border-left: 4px solid #fbbf24; }
        .card { background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        
        /* Modal styles */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); }
        .modal.show { display: flex; align-items: center; justify-content: center; }
        .modal-content { background: white; padding: 30px; border-radius: 16px; max-width: 500px; width: 90%; box-shadow: 0 20px 60px rgba(0,0,0,.3); animation: slideDown 0.3s; }
        @keyframes slideDown { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        
        /* Form styles */
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; font-weight: 700; color: #374151; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
        .form-input { width: 100%; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 15px; transition: all 0.2s; }
        .form-input:focus { outline: none; border-color: #dc2626; box-shadow: 0 0 0 3px rgba(220,38,38,0.1); }
        .form-select { width: 100%; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 15px; cursor: pointer; }
        
        /* Success message */
        .success-msg { background: #10b981; color: white; padding: 16px 20px; border-radius: 8px; margin-bottom: 20px; display: none; }
        .success-msg.show { display: flex; align-items: center; gap: 12px; animation: slideDown 0.3s; }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside class="sidebar w-64 text-white fixed h-full overflow-y-auto">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/lumc-logo.png') }}" alt="LUMC" class="h-12 w-12">
                    <div>
                        <h2 class="font-black text-lg">LUMC</h2>
                        <p class="text-xs text-white/70">Nurse Portal</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-2">
                <div class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('dashboard')">
                    <i class="fas fa-home w-5"></i><span>Dashboard</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('add-patient')">
                    <i class="fas fa-user-plus w-5"></i><span>Add Patient</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('my-patients')">
                    <i class="fas fa-users w-5"></i><span>My Patients</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('medication')">
                    <i class="fas fa-pills w-5"></i><span>Medication Schedule</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('rooms')">
                    <i class="fas fa-bed w-5"></i><span>Room Assignments</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('vitals')">
                    <i class="fas fa-heartbeat w-5"></i><span>Vital Signs Log</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('schedule')">
                    <i class="fas fa-calendar-alt w-5"></i><span>My Schedule</span>
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
                        <h1 class="text-2xl font-black text-gray-900" id="pageTitle">Nurse Dashboard</h1>
                        <p class="text-sm text-gray-500">Teresa Gomez - Registered Nurse</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="relative p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-bold text-gray-900">Teresa Gomez</p>
                                <p class="text-xs text-gray-500">Registered Nurse</p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-[#dc2626] to-[#ef4444] rounded-full flex items-center justify-center text-white font-bold">
                                TG
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
                    <div class="card p-6 bg-gradient-to-r from-[#dc2626] to-[#ef4444] text-white mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-2">Welcome, Nurse Teresa! 👩‍⚕️</h2>
                                <p class="text-white/90">You have 12 patients under your care today.</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-white/80">{{ date('l') }}</p>
                                <p class="text-lg font-bold">{{ date('F d, Y') }}</p>
                                <p class="text-sm text-white/80">Shift: 7:00 AM - 3:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="card p-6 border-l-4 border-l-blue-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-users text-blue-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">12</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Assigned Patients</h3>
                            <p class="text-xs text-gray-500 mt-1">Active cases today</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-yellow-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-pills text-yellow-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">8</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Meds Due</h3>
                            <p class="text-xs text-gray-500 mt-1">Next in 30 minutes</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-green-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">15</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Tasks Completed</h3>
                            <p class="text-xs text-gray-500 mt-1">Out of 23 today</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-red-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clock text-red-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">3</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Pending Approvals</h3>
                            <p class="text-xs text-gray-500 mt-1">Awaiting doctor</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid md:grid-cols-4 gap-4">
                        <button onclick="showTab('add-patient')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-user-plus text-blue-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Add Patient</h4>
                        </button>
                        <button onclick="showTab('vitals')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-heartbeat text-green-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Log Vitals</h4>
                        </button>
                        <button onclick="showTab('medication')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-pills text-yellow-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Medications</h4>
                        </button>
                        <button onclick="showTab('my-patients')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-users text-purple-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">View Patients</h4>
                        </button>
                    </div>
                </div>

                <!-- TAB 2: Add Patient -->
                <div id="tab-add-patient" class="tab-content">
                    <div class="max-w-4xl mx-auto">
                        <div class="card p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">Add New Patient</h3>
                                    <p class="text-sm text-gray-500">Submit for doctor approval</p>
                                </div>
                            </div>

                            <form onsubmit="addPatient(event)">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="form-group">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" class="form-input" placeholder="e.g., Juan Dela Cruz" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Date of Birth *</label>
                                        <input type="date" class="form-input" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Gender *</label>
                                        <select class="form-select" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Blood Type</label>
                                        <select class="form-select">
                                            <option value="">Select Blood Type</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-input" placeholder="09171234567" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Emergency Contact</label>
                                        <input type="tel" class="form-input" placeholder="09181234567">
                                    </div>

                                    <div class="form-group md:col-span-2">
                                        <label class="form-label">Complete Address *</label>
                                        <input type="text" class="form-input" placeholder="Brgy. San Nicolas, Agoo, La Union" required>
                                    </div>

                                    <div class="form-group md:col-span-2">
                                        <label class="form-label">Reason for Admission *</label>
                                        <textarea class="form-input" rows="3" placeholder="Describe symptoms and reason for hospital admission" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Assign to Doctor *</label>
                                        <select class="form-select" required>
                                            <option value="">Select Doctor</option>
                                            <option value="1">Dr. Ricardo Santos (Internal Medicine)</option>
                                            <option value="2">Dr. Carmen Aguilar (Cardiology)</option>
                                            <option value="3">Dr. Maria Reyes (Pediatrics)</option>
                                            <option value="4">Dr. Jose Fernandez (Surgery)</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Priority Level *</label>
                                        <select class="form-select" required>
                                            <option value="">Select Priority</option>
                                            <option value="emergency">Emergency</option>
                                            <option value="urgent">Urgent</option>
                                            <option value="routine">Routine</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex gap-4 mt-8">
                                    <button type="submit" class="flex-1 px-6 py-4 bg-gradient-to-r from-[#dc2626] to-[#ef4444] text-white font-bold rounded-lg hover:shadow-xl transition">
                                        <i class="fas fa-paper-plane mr-2"></i> Submit for Approval
                                    </button>
                                    <button type="reset" class="px-6 py-4 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition">
                                        <i class="fas fa-redo mr-2"></i> Reset Form
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: My Patients -->
                <div id="tab-my-patients" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">My Assigned Patients (12)</h3>
                            <input type="text" placeholder="Search patients..." class="px-4 py-2 border-2 border-gray-300 rounded-lg focus:border-red-600 focus:outline-none" onkeyup="searchPatients(this.value)">
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" id="patientsList">
                            <!-- Patient Card 1 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition cursor-pointer patient-card" onclick="viewPatientProfile('Maria Clara Santos', 'Room 201A', 'Diabetes Management', 'Dr. Ricardo Santos', 'O+', '165 cm', '58 kg', 'Penicillin')">
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
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition cursor-pointer patient-card" onclick="viewPatientProfile('Jose Rizal Cruz', 'Room 203B', 'Post-operative Care', 'Dr. Carmen Aguilar', 'A+', '172 cm', '75 kg', 'None')">
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

                            <!-- Patient Card 3 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition cursor-pointer patient-card" onclick="viewPatientProfile('Ana Reyes Dela Cruz', 'Room 205A', 'Hypertension', 'Dr. Ricardo Santos', 'B+', '160 cm', '62 kg', 'Aspirin')">
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

                            <!-- Patient Card 4 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition cursor-pointer patient-card" onclick="viewPatientProfile('Pedro Garcia Aquino', 'Room 208C', 'Pneumonia', 'Dr. Maria Reyes', 'O+', '168 cm', '80 kg', 'None')">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        PA
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Pedro Garcia Aquino</h4>
                                        <p class="text-xs text-gray-500">ID: P-2024-004</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded">Room 208C</span>
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded">Monitoring</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">Pneumonia</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Patient Card 5 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition cursor-pointer patient-card" onclick="viewPatientProfile('Luz Martinez Valdez', 'Room 210B', 'Gastritis', 'Dr. Jose Fernandez', 'AB+', '158 cm', '55 kg', 'Ibuprofen')">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        LV
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Luz Martinez Valdez</h4>
                                        <p class="text-xs text-gray-500">ID: P-2024-005</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded">Room 210B</span>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded">Improving</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">Gastritis</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Patient Card 6 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition cursor-pointer patient-card" onclick="viewPatientProfile('Roberto Santos Jr.', 'Room 212A', 'Fracture Recovery', 'Dr. Carmen Aguilar', 'O-', '175 cm', '78 kg', 'None')">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        RS
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Roberto Santos Jr.</h4>
                                        <p class="text-xs text-gray-500">ID: P-2024-006</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded">Room 212A</span>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded">Recovering</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">Fracture Recovery</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: Medication Schedule -->
                <div id="tab-medication" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Medication Schedule - Today</h3>
                            <span class="text-sm text-gray-500">{{ date('h:i A') }}</span>
                        </div>

                        <div class="space-y-4">
                            <!-- Medication 1 - DUE NOW -->
                            <div class="flex items-center gap-4 p-5 bg-red-50 border-l-4 border-red-500 rounded-lg" id="med-1">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-bold text-gray-900">Maria Clara Santos - Room 201A</h4>
                                        <span class="text-xs font-bold text-red-600">DUE NOW</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <strong>Medication:</strong> Metformin 500mg - 1 tablet
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <i class="fas fa-clock mr-1"></i> Scheduled: 9:00 AM | 
                                        <i class="fas fa-user-md mr-1 ml-2"></i> Dr. Ricardo Santos
                                    </p>
                                </div>
                                <button onclick="markMedicationGiven('med-1', 'Maria Clara Santos', 'Metformin 500mg')" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">
                                    <i class="fas fa-check mr-2"></i> Mark Given
                                </button>
                            </div>

                            <!-- Medication 2 - DUE NOW -->
                            <div class="flex items-center gap-4 p-5 bg-red-50 border-l-4 border-red-500 rounded-lg" id="med-2">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-bold text-gray-900">Pedro Garcia Aquino - Room 208C</h4>
                                        <span class="text-xs font-bold text-red-600">DUE NOW</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <strong>Medication:</strong> Paracetamol 500mg - 1 tablet
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <i class="fas fa-clock mr-1"></i> Scheduled: 9:00 AM | 
                                        <i class="fas fa-user-md mr-1 ml-2"></i> Dr. Maria Reyes
                                    </p>
                                </div>
                                <button onclick="markMedicationGiven('med-2', 'Pedro Garcia Aquino', 'Paracetamol 500mg')" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">
                                    <i class="fas fa-check mr-2"></i> Mark Given
                                </button>
                            </div>

                            <!-- Medication 3 - IN 30 MIN -->
                            <div class="flex items-center gap-4 p-5 bg-yellow-50 border-l-4 border-yellow-500 rounded-lg" id="med-3">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-bold text-gray-900">Jose Rizal Cruz - Room 203B</h4>
                                        <span class="text-xs font-bold text-yellow-600">IN 30 MIN</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <strong>Medication:</strong> Amoxicillin 500mg - 1 capsule
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <i class="fas fa-clock mr-1"></i> Scheduled: 9:30 AM | 
                                        <i class="fas fa-user-md mr-1 ml-2"></i> Dr. Carmen Aguilar
                                    </p>
                                </div>
                                <button class="px-6 py-3 bg-gray-300 text-gray-700 font-bold rounded-lg cursor-not-allowed" disabled>
                                    Not Yet Due
                                </button>
                            </div>

                            <!-- Medication 4 - COMPLETED -->
                            <div class="flex items-center gap-4 p-5 bg-green-50 border-l-4 border-green-500 rounded-lg opacity-60">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-bold text-gray-900">Ana Reyes Dela Cruz - Room 205A</h4>
                                        <span class="text-xs font-bold text-green-600">✓ GIVEN</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <strong>Medication:</strong> Losartan 50mg - 1 tablet
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <i class="fas fa-clock mr-1"></i> Given at: 8:00 AM | 
                                        <i class="fas fa-user-nurse mr-1 ml-2"></i> By: You
                                    </p>
                                </div>
                                <div class="px-6 py-3 bg-green-100 text-green-800 font-bold rounded-lg text-center">
                                    <i class="fas fa-check-circle"></i> Completed
                                </div>
                            </div>

                            <!-- Medication 5 - IN 2 HRS -->
                            <div class="flex items-center gap-4 p-5 bg-blue-50 border-l-4 border-blue-500 rounded-lg" id="med-5">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-bold text-gray-900">Luz Martinez Valdez - Room 210B</h4>
                                        <span class="text-xs font-bold text-blue-600">IN 2 HRS</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <strong>Medication:</strong> Omeprazole 20mg - 1 capsule
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <i class="fas fa-clock mr-1"></i> Scheduled: 11:00 AM | 
                                        <i class="fas fa-user-md mr-1 ml-2"></i> Dr. Jose Fernandez
                                    </p>
                                </div>
                                <button class="px-6 py-3 bg-gray-300 text-gray-700 font-bold rounded-lg cursor-not-allowed" disabled>
                                    Not Yet Due
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 5: Room Assignments -->
                <div id="tab-rooms" class="tab-content">
                    <div class="card p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Room Assignments Overview</h3>

                        <div class="grid md:grid-cols-3 gap-6">
                            <!-- Room 201A -->
                            <div class="card p-5 border-2 border-blue-500 bg-blue-50">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-xl font-bold text-blue-900">Room 201A</h4>
                                    <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">Occupied</span>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm"><strong>Patient:</strong> Maria Clara Santos</p>
                                    <p class="text-sm"><strong>Condition:</strong> Diabetes Management</p>
                                    <p class="text-sm"><strong>Admitted:</strong> Feb 10, 2024</p>
                                    <p class="text-sm"><strong>Doctor:</strong> Dr. Ricardo Santos</p>
                                </div>
                                <button onclick="viewPatientProfile('Maria Clara Santos', 'Room 201A', 'Diabetes Management', 'Dr. Ricardo Santos', 'O+', '165 cm', '58 kg', 'Penicillin')" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-sm">
                                    View Details
                                </button>
                            </div>

                            <!-- Room 203B -->
                            <div class="card p-5 border-2 border-blue-500 bg-blue-50">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-xl font-bold text-blue-900">Room 203B</h4>
                                    <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">Occupied</span>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm"><strong>Patient:</strong> Jose Rizal Cruz</p>
                                    <p class="text-sm"><strong>Condition:</strong> Post-operative Care</p>
                                    <p class="text-sm"><strong>Admitted:</strong> Feb 09, 2024</p>
                                    <p class="text-sm"><strong>Doctor:</strong> Dr. Carmen Aguilar</p>
                                </div>
                                <button onclick="viewPatientProfile('Jose Rizal Cruz', 'Room 203B', 'Post-operative Care', 'Dr. Carmen Aguilar', 'A+', '172 cm', '75 kg', 'None')" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-sm">
                                    View Details
                                </button>
                            </div>

                            <!-- Room 205A -->
                            <div class="card p-5 border-2 border-blue-500 bg-blue-50">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-xl font-bold text-blue-900">Room 205A</h4>
                                    <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">Occupied</span>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm"><strong>Patient:</strong> Ana Reyes Dela Cruz</p>
                                    <p class="text-sm"><strong>Condition:</strong> Hypertension</p>
                                    <p class="text-sm"><strong>Admitted:</strong> Feb 11, 2024</p>
                                    <p class="text-sm"><strong>Doctor:</strong> Dr. Ricardo Santos</p>
                                </div>
                                <button onclick="viewPatientProfile('Ana Reyes Dela Cruz', 'Room 205A', 'Hypertension', 'Dr. Ricardo Santos', 'B+', '160 cm', '62 kg', 'Aspirin')" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-sm">
                                    View Details
                                </button>
                            </div>

                            <!-- Room 208C -->
                            <div class="card p-5 border-2 border-blue-500 bg-blue-50">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-xl font-bold text-blue-900">Room 208C</h4>
                                    <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">Occupied</span>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm"><strong>Patient:</strong> Pedro Garcia Aquino</p>
                                    <p class="text-sm"><strong>Condition:</strong> Pneumonia</p>
                                    <p class="text-sm"><strong>Admitted:</strong> Feb 08, 2024</p>
                                    <p class="text-sm"><strong>Doctor:</strong> Dr. Maria Reyes</p>
                                </div>
                                <button onclick="viewPatientProfile('Pedro Garcia Aquino', 'Room 208C', 'Pneumonia', 'Dr. Maria Reyes', 'O+', '168 cm', '80 kg', 'None')" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-sm">
                                    View Details
                                </button>
                            </div>

                            <!-- Room 210B -->
                            <div class="card p-5 border-2 border-blue-500 bg-blue-50">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-xl font-bold text-blue-900">Room 210B</h4>
                                    <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">Occupied</span>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm"><strong>Patient:</strong> Luz Martinez Valdez</p>
                                    <p class="text-sm"><strong>Condition:</strong> Gastritis</p>
                                    <p class="text-sm"><strong>Admitted:</strong> Feb 11, 2024</p>
                                    <p class="text-sm"><strong>Doctor:</strong> Dr. Jose Fernandez</p>
                                </div>
                                <button onclick="viewPatientProfile('Luz Martinez Valdez', 'Room 210B', 'Gastritis', 'Dr. Jose Fernandez', 'AB+', '158 cm', '55 kg', 'Ibuprofen')" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-sm">
                                    View Details
                                </button>
                            </div>

                            <!-- Room 212A - Available -->
                            <div class="card p-5 border-2 border-green-500 bg-green-50">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-xl font-bold text-green-900">Room 212A</h4>
                                    <span class="px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-full">Available</span>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm text-gray-600">This room is currently available for new patient admission.</p>
                                    <p class="text-sm"><strong>Room Type:</strong> Private</p>
                                    <p class="text-sm"><strong>Capacity:</strong> 1 Bed</p>
                                </div>
                                <button onclick="showTab('add-patient')" class="mt-4 w-full px-4 py-2 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition text-sm">
                                    Assign Patient
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 6: Vital Signs Log -->
                <div id="tab-vitals" class="tab-content">
                    <div class="max-w-4xl mx-auto">
                        <div class="card p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-heartbeat text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">Log Vital Signs</h3>
                                    <p class="text-sm text-gray-500">Record patient vital signs</p>
                                </div>
                            </div>

                            <form onsubmit="logVitals(event)">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="form-group md:col-span-2">
                                        <label class="form-label">Select Patient *</label>
                                        <select class="form-select" required>
                                            <option value="">Choose patient...</option>
                                            <option value="1">Maria Clara Santos - Room 201A</option>
                                            <option value="2">Jose Rizal Cruz - Room 203B</option>
                                            <option value="3">Ana Reyes Dela Cruz - Room 205A</option>
                                            <option value="4">Pedro Garcia Aquino - Room 208C</option>
                                            <option value="5">Luz Martinez Valdez - Room 210B</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Blood Pressure *</label>
                                        <input type="text" class="form-input" placeholder="e.g., 120/80" required>
                                        <p class="text-xs text-gray-500 mt-1">Format: systolic/diastolic mmHg</p>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Temperature (°C) *</label>
                                        <input type="number" step="0.1" class="form-input" placeholder="e.g., 36.5" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Heart Rate (bpm) *</label>
                                        <input type="number" class="form-input" placeholder="e.g., 72" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Respiratory Rate *</label>
                                        <input type="number" class="form-input" placeholder="e.g., 16" required>
                                        <p class="text-xs text-gray-500 mt-1">Breaths per minute</p>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Oxygen Saturation (%) *</label>
                                        <input type="number" class="form-input" placeholder="e.g., 98" required>
                                        <p class="text-xs text-gray-500 mt-1">SpO2 percentage</p>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" step="0.1" class="form-input" placeholder="e.g., 65.5">
                                    </div>

                                    <div class="form-group md:col-span-2">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-input" rows="3" placeholder="Any additional observations..."></textarea>
                                    </div>
                                </div>

                                <div class="flex gap-4 mt-8">
                                    <button type="submit" class="flex-1 px-6 py-4 bg-gradient-to-r from-[#16a34a] to-[#22c55e] text-white font-bold rounded-lg hover:shadow-xl transition">
                                        <i class="fas fa-save mr-2"></i> Save Vital Signs
                                    </button>
                                    <button type="reset" class="px-6 py-4 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition">
                                        <i class="fas fa-redo mr-2"></i> Clear
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Recent Vital Signs -->
                        <div class="card p-6 mt-6">
                            <h4 class="font-bold text-gray-900 mb-4">Recent Vital Signs Logs</h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-bold text-gray-900">Maria Clara Santos</p>
                                        <p class="text-xs text-gray-500">BP: 125/82 | Temp: 36.8°C | HR: 78 bpm | Logged at 8:30 AM</p>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Normal</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-bold text-gray-900">Pedro Garcia Aquino</p>
                                        <p class="text-xs text-gray-500">BP: 138/88 | Temp: 37.2°C | HR: 82 bpm | Logged at 8:15 AM</p>
                                    </div>
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">Elevated</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: My Schedule -->
                <div id="tab-schedule" class="tab-content">
                    <div class="card p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">My Work Schedule</h3>

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <!-- Current Shift -->
                            <div class="card p-6 bg-gradient-to-br from-green-500 to-green-600 text-white">
                                <div class="flex items-center gap-3 mb-4">
                                    <i class="fas fa-clock text-3xl"></i>
                                    <div>
                                        <h4 class="font-bold text-lg">Current Shift</h4>
                                        <p class="text-sm text-white/90">Today - {{ date('F d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="text-3xl font-black mb-2">7:00 AM - 3:00 PM</div>
                                <p class="text-white/90">Morning Shift (8 hours)</p>
                            </div>

                            <!-- Next Shift -->
                            <div class="card p-6 border-2 border-blue-500">
                                <div class="flex items-center gap-3 mb-4">
                                    <i class="fas fa-calendar-alt text-3xl text-blue-600"></i>
                                    <div>
                                        <h4 class="font-bold text-lg text-gray-900">Next Shift</h4>
                                        <p class="text-sm text-gray-500">Tomorrow</p>
                                    </div>
                                </div>
                                <div class="text-2xl font-black text-gray-900 mb-2">7:00 AM - 3:00 PM</div>
                                <p class="text-gray-600">Morning Shift (8 hours)</p>
                            </div>
                        </div>

                        <!-- Weekly Schedule -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-200">
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Day</th>
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Shift</th>
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Hours</th>
                                        <th class="text-left py-3 px-4 font-bold text-gray-900">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Monday</td>
                                        <td class="py-4 px-4">7:00 AM - 3:00 PM</td>
                                        <td class="py-4 px-4">8 hours</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Scheduled</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Tuesday</td>
                                        <td class="py-4 px-4">7:00 AM - 3:00 PM</td>
                                        <td class="py-4 px-4">8 hours</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Scheduled</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50 bg-blue-50">
                                        <td class="py-4 px-4 font-semibold">Wednesday (Today)</td>
                                        <td class="py-4 px-4">7:00 AM - 3:00 PM</td>
                                        <td class="py-4 px-4">8 hours</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Active</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Thursday</td>
                                        <td class="py-4 px-4">7:00 AM - 3:00 PM</td>
                                        <td class="py-4 px-4">8 hours</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Scheduled</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Friday</td>
                                        <td class="py-4 px-4">7:00 AM - 3:00 PM</td>
                                        <td class="py-4 px-4">8 hours</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Scheduled</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Saturday</td>
                                        <td class="py-4 px-4 text-gray-400">-</td>
                                        <td class="py-4 px-4 text-gray-400">-</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-full">Day Off</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Sunday</td>
                                        <td class="py-4 px-4 text-gray-400">-</td>
                                        <td class="py-4 px-4 text-gray-400">-</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-full">Day Off</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Confirm Action</h3>
                <p class="text-gray-600" id="confirmMessage">Are you sure?</p>
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal()" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </button>
                <button id="confirmBtn" class="flex-1 px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <!-- Patient Profile Modal -->
    <div id="profileModal" class="modal">
        <div class="modal-content" style="max-width: 600px;">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Patient Profile</h3>
                <button onclick="closeProfileModal()" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div id="profileContent"></div>
            
            <button onclick="closeProfileModal()" class="mt-6 w-full px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition">
                Close
            </button>
        </div>
    </div>

    <script>
        // Tab Navigation
        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Remove active from all nav items
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById('tab-' + tabName).classList.add('active');
            
            // Update active nav item
            event.target.closest('.nav-item').classList.add('active');
            
            // Update page title
            const titles = {
                'dashboard': 'Nurse Dashboard',
                'add-patient': 'Add New Patient',
                'my-patients': 'My Patients',
                'medication': 'Medication Schedule',
                'rooms': 'Room Assignments',
                'vitals': 'Vital Signs Log',
                'schedule': 'My Schedule'
            };
            document.getElementById('pageTitle').textContent = titles[tabName];
            
            // Scroll to top
            window.scrollTo(0, 0);
        }

        // Success Message
        function showSuccess(message) {
            const successMsg = document.getElementById('successMessage');
            document.getElementById('successText').textContent = message;
            successMsg.classList.add('show');
            setTimeout(() => {
                successMsg.classList.remove('show');
            }, 5000);
        }

        // Add Patient
        function addPatient(event) {
            event.preventDefault();
            
            document.getElementById('confirmMessage').textContent = 'Submit this patient admission for doctor approval?';
            document.getElementById('confirmBtn').onclick = function() {
                showSuccess('Patient admission submitted successfully! Waiting for doctor approval.');
                event.target.reset();
                closeModal();
                setTimeout(() => {
                    showTab('my-patients');
                }, 1500);
            };
            
            document.getElementById('confirmModal').classList.add('show');
        }

        // Mark Medication Given
        function markMedicationGiven(medId, patientName, medication) {
            document.getElementById('confirmMessage').textContent = `Mark ${medication} as given to ${patientName}?`;
            document.getElementById('confirmBtn').onclick = function() {
                const medElement = document.getElementById(medId);
                medElement.classList.remove('bg-red-50', 'border-red-500', 'bg-yellow-50', 'border-yellow-500');
                medElement.classList.add('bg-green-50', 'border-green-500', 'opacity-60');
                
                const button = medElement.querySelector('button');
                const now = new Date();
                const time = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                
                medElement.innerHTML = `
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-bold text-gray-900">${patientName}</h4>
                            <span class="text-xs font-bold text-green-600">✓ GIVEN</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-1">
                            <strong>Medication:</strong> ${medication}
                        </p>
                        <p class="text-xs text-gray-500">
                            <i class="fas fa-clock mr-1"></i> Given at: ${time} | 
                            <i class="fas fa-user-nurse mr-1 ml-2"></i> By: You
                        </p>
                    </div>
                    <div class="px-6 py-3 bg-green-100 text-green-800 font-bold rounded-lg text-center">
                        <i class="fas fa-check-circle"></i> Completed
                    </div>
                `;
                
                showSuccess(`Medication marked as given to ${patientName} at ${time}`);
                closeModal();
            };
            
            document.getElementById('confirmModal').classList.add('show');
        }

        // Log Vitals
        function logVitals(event) {
            event.preventDefault();
            
            document.getElementById('confirmMessage').textContent = 'Save these vital signs?';
            document.getElementById('confirmBtn').onclick = function() {
                showSuccess('Vital signs logged successfully!');
                event.target.reset();
                closeModal();
            };
            
            document.getElementById('confirmModal').classList.add('show');
        }

        // View Patient Profile
        function viewPatientProfile(name, room, condition, doctor, bloodType, height, weight, allergies) {
            const content = `
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b-2 border-gray-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            ${name.split(' ').map(n => n[0]).join('')}
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">${name}</h4>
                            <p class="text-sm text-gray-500">${room} • ${condition}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Blood Type</p>
                            <p class="font-bold text-gray-900">${bloodType}</p>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Height</p>
                            <p class="font-bold text-gray-900">${height}</p>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Weight</p>
                            <p class="font-bold text-gray-900">${weight}</p>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Attending Doctor</p>
                            <p class="font-bold text-gray-900 text-sm">${doctor}</p>
                        </div>
                    </div>
                    
                    <div class="p-4 bg-red-50 border-l-4 border-red-500 rounded">
                        <p class="text-xs font-bold text-red-600 mb-1">ALLERGIES</p>
                        <p class="font-bold text-red-900">${allergies}</p>
                    </div>
                    
                    <div class="p-4 bg-blue-50 rounded-lg">
                        <p class="text-xs font-bold text-blue-600 mb-2">CURRENT CONDITION</p>
                        <p class="text-sm text-gray-900">${condition}</p>
                    </div>
                </div>
            `;
            
            document.getElementById('profileContent').innerHTML = content;
            document.getElementById('profileModal').classList.add('show');
        }

        // Search Patients
        function searchPatients(query) {
            const cards = document.querySelectorAll('.patient-card');
            const lowerQuery = query.toLowerCase();
            
            cards.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (text.includes(lowerQuery)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Modal Functions
        function closeModal() {
            document.getElementById('confirmModal').classList.remove('show');
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.remove('show');
        }

        // Close modals on background click
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('show');
            }
        }
    </script>
</body>
</html>