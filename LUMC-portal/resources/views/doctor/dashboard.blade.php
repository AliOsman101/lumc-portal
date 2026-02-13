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
        .modal-content { background: white; padding: 30px; border-radius: 16px; max-width: 800px; width: 90%; box-shadow: 0 20px 60px rgba(0,0,0,.3); animation: slideDown 0.3s; max-height: 90vh; overflow-y: auto; }
        @keyframes slideDown { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        
        /* Form */
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; font-weight: 700; color: #374151; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
        .form-input, .form-select, .form-textarea { width: 100%; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 15px; transition: all 0.2s; }
        .form-input:focus, .form-select:focus, .form-textarea:focus { outline: none; border-color: #16a34a; box-shadow: 0 0 0 3px rgba(22,163,74,0.1); }
        
        .success-msg { background: #10b981; color: white; padding: 16px 20px; border-radius: 8px; margin-bottom: 20px; display: none; }
        .success-msg.show { display: flex; align-items: center; gap: 12px; animation: slideDown 0.3s; }
        
        /* Notification Badge */
        .notif-badge { position: absolute; top: -4px; right: -4px; background: #ef4444; color: white; font-size: 10px; font-weight: bold; padding: 2px 6px; border-radius: 10px; }
        
        /* Image Preview */
        .image-preview { max-width: 100%; height: auto; border-radius: 8px; border: 2px solid #e5e7eb; }
        
        /* Status Pills */
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-in-progress { background: #dbeafe; color: #1e40af; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-reviewed { background: #e0e7ff; color: #3730a3; }
        .status-urgent { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside class="sidebar w-64 text-white fixed h-full overflow-y-auto">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="h-12 w-12 bg-white rounded-lg flex items-center justify-center">
                        <span class="text-green-600 font-black text-xl">L</span>
                    </div>
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
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold relative" onclick="showTab('diagnostic-orders')">
                    <i class="fas fa-x-ray w-5"></i><span>Diagnostic Orders</span>
                    <span class="notif-badge" id="ordersNotifBadge">3</span>
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
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('prescriptions')">
                    <i class="fas fa-prescription w-5"></i><span>Prescriptions</span>
                </div>
            </nav>

            <div class="p-4 border-t border-white/10 mt-auto">
                <a href="#" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold">
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
                        <button class="relative p-2 hover:bg-gray-100 rounded-full" onclick="showNotifications()">
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
                    <div class="card p-6 bg-gradient-to-r from-[#1D4ED8] to-[#22c55e] text-white mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-2">Welcome, Dr. Santos! 👨‍⚕️</h2>
                                <p class="text-white/90">You have 5 appointments scheduled for today.</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-white/80">Friday</p>
                                <p class="text-lg font-bold">February 13, 2026</p>
                                <p class="text-sm text-white/80">2:30 PM</p>
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
                                    <i class="fas fa-x-ray text-yellow-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">7</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Pending Orders</h3>
                            <p class="text-xs text-gray-500 mt-1">3 awaiting results</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-green-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clipboard-check text-green-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">3</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Results Ready</h3>
                            <p class="text-xs text-gray-500 mt-1">Needs your review</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-red-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">1</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Urgent Orders</h3>
                            <p class="text-xs text-gray-500 mt-1">Requires attention</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid md:grid-cols-4 gap-4">
                        <button onclick="showTab('diagnostic-orders')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-x-ray text-blue-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Order X-ray</h4>
                        </button>
                        <button onclick="showTab('diagnostic-orders'); setTimeout(() => document.getElementById('resultsReadyTab').click(), 100)" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-file-medical text-green-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Review Results</h4>
                        </button>
                        <button onclick="showTab('appointments')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-calendar-check text-yellow-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Appointments</h4>
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
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Today's Appointments - February 13, 2026</h3>

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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: DIAGNOSTIC ORDERS (NEW) -->
                <div id="tab-diagnostic-orders" class="tab-content">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">Diagnostic Orders - X-ray</h3>
                        <button onclick="openCreateOrderModal()" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 flex items-center gap-2">
                            <i class="fas fa-plus"></i> Create X-ray Order
                        </button>
                    </div>

                    <!-- Sub-tabs for Orders -->
                    <div class="card p-4 mb-6">
                        <div class="flex gap-2 overflow-x-auto">
                            <button onclick="filterOrders('all')" class="orders-filter-btn active px-6 py-3 font-bold rounded-lg transition" data-filter="all">
                                All Orders <span class="ml-2 px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-full">7</span>
                            </button>
                            <button onclick="filterOrders('pending')" class="orders-filter-btn px-6 py-3 font-bold rounded-lg transition" data-filter="pending">
                                Pending <span class="ml-2 px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">2</span>
                            </button>
                            <button onclick="filterOrders('in-progress')" class="orders-filter-btn px-6 py-3 font-bold rounded-lg transition" data-filter="in-progress">
                                In Progress <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">2</span>
                            </button>
                            <button id="resultsReadyTab" onclick="filterOrders('completed')" class="orders-filter-btn px-6 py-3 font-bold rounded-lg transition" data-filter="completed">
                                Results Ready <span class="ml-2 px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">3</span>
                            </button>
                            <button onclick="filterOrders('reviewed')" class="orders-filter-btn px-6 py-3 font-bold rounded-lg transition" data-filter="reviewed">
                                Reviewed <span class="ml-2 px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">0</span>
                            </button>
                        </div>
                    </div>

                    <!-- Orders List -->
                    <div class="space-y-4" id="ordersList">
                        
                        <!-- Order 1 - COMPLETED (Results Ready) -->
                        <div class="card p-6 border-l-4 border-l-green-500 order-item" data-status="completed">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-start gap-4 flex-1">
                                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-x-ray text-green-600 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h4 class="text-lg font-bold text-gray-900">Chest X-ray (PA & Lateral)</h4>
                                            <span class="px-3 py-1 status-completed text-xs font-bold rounded-full">Results Ready</span>
                                            <span class="px-3 py-1 bg-orange-100 text-orange-800 text-xs font-bold rounded-full">
                                                <i class="fas fa-bell"></i> NEW
                                            </span>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Patient</p>
                                                <p class="font-bold text-gray-900">Maria Clara Santos</p>
                                                <p class="text-xs text-gray-500">P-2024-001 • 45 yrs, Female</p>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Clinical Indication</p>
                                                <p class="text-gray-700">Chronic cough, rule out pneumonia</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4 text-xs text-gray-600">
                                            <span><i class="fas fa-calendar mr-1"></i> Ordered: Feb 12, 2026 10:30 AM</span>
                                            <span><i class="fas fa-check-circle mr-1 text-green-600"></i> Completed: Feb 13, 2026 8:15 AM</span>
                                            <span><i class="fas fa-user-nurse mr-1"></i> Rad Tech: John Mendoza</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <button onclick="reviewResults('ORD-2024-001', 'Maria Clara Santos', 'Chest X-ray')" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-file-medical"></i> Review Results
                                    </button>
                                    <button onclick="viewOrderDetails('ORD-2024-001')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-eye"></i> View Order
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Order 2 - IN PROGRESS -->
                        <div class="card p-6 border-l-4 border-l-blue-500 order-item" data-status="in-progress">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-start gap-4 flex-1">
                                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-x-ray text-blue-600 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h4 class="text-lg font-bold text-gray-900">Lumbar Spine X-ray (AP & Lateral)</h4>
                                            <span class="px-3 py-1 status-in-progress text-xs font-bold rounded-full">In Progress</span>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Patient</p>
                                                <p class="font-bold text-gray-900">Jose Rizal Cruz</p>
                                                <p class="text-xs text-gray-500">P-2024-002 • 52 yrs, Male</p>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Clinical Indication</p>
                                                <p class="text-gray-700">Lower back pain, possible herniation</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4 text-xs text-gray-600">
                                            <span><i class="fas fa-calendar mr-1"></i> Ordered: Feb 13, 2026 9:00 AM</span>
                                            <span><i class="fas fa-user-nurse mr-1"></i> Coordinated by: Nurse Teresa</span>
                                            <span class="text-blue-600 font-bold"><i class="fas fa-hourglass-half mr-1"></i> Patient in Radiology Dept</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <button onclick="viewOrderDetails('ORD-2024-002')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-eye"></i> View Order
                                    </button>
                                    <button onclick="cancelOrder('ORD-2024-002')" class="px-6 py-3 bg-red-100 text-red-700 font-bold rounded-lg hover:bg-red-200 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-times"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Order 3 - PENDING -->
                        <div class="card p-6 border-l-4 border-l-yellow-500 order-item" data-status="pending">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-start gap-4 flex-1">
                                    <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-x-ray text-yellow-600 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h4 class="text-lg font-bold text-gray-900">Chest X-ray (PA View)</h4>
                                            <span class="px-3 py-1 status-pending text-xs font-bold rounded-full">Pending</span>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Patient</p>
                                                <p class="font-bold text-gray-900">Ana Reyes Dela Cruz</p>
                                                <p class="text-xs text-gray-500">P-2024-003 • 38 yrs, Female</p>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Clinical Indication</p>
                                                <p class="text-gray-700">Pre-operative clearance, scheduled surgery</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4 text-xs text-gray-600">
                                            <span><i class="fas fa-calendar mr-1"></i> Ordered: Feb 13, 2026 1:45 PM</span>
                                            <span class="text-yellow-600 font-bold"><i class="fas fa-clock mr-1"></i> Awaiting nurse coordination</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <button onclick="viewOrderDetails('ORD-2024-003')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-eye"></i> View Order
                                    </button>
                                    <button onclick="cancelOrder('ORD-2024-003')" class="px-6 py-3 bg-red-100 text-red-700 font-bold rounded-lg hover:bg-red-200 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-times"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Order 4 - COMPLETED (Results Ready) -->
                        <div class="card p-6 border-l-4 border-l-green-500 order-item" data-status="completed">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-start gap-4 flex-1">
                                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-x-ray text-green-600 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h4 class="text-lg font-bold text-gray-900">Hand X-ray (AP & Oblique)</h4>
                                            <span class="px-3 py-1 status-completed text-xs font-bold rounded-full">Results Ready</span>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Patient</p>
                                                <p class="font-bold text-gray-900">Pedro Garcia Aquino</p>
                                                <p class="text-xs text-gray-500">P-2024-004 • 29 yrs, Male</p>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 text-xs uppercase font-bold mb-1">Clinical Indication</p>
                                                <p class="text-gray-700">Trauma, possible fracture</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4 text-xs text-gray-600">
                                            <span><i class="fas fa-calendar mr-1"></i> Ordered: Feb 13, 2026 11:00 AM</span>
                                            <span><i class="fas fa-check-circle mr-1 text-green-600"></i> Completed: Feb 13, 2026 2:00 PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <button onclick="reviewResults('ORD-2024-004', 'Pedro Garcia Aquino', 'Hand X-ray')" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-file-medical"></i> Review Results
                                    </button>
                                    <button onclick="viewOrderDetails('ORD-2024-004')" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-eye"></i> View Order
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- TAB 4: My Patients -->
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

                            <!-- Patient Card 3 -->
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

                <!-- TAB 5: Pending Approvals -->
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
                        </div>
                    </div>
                </div>

                <!-- TAB 6: My Schedule -->
                <div id="tab-schedule" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">My Work Schedule</h3>
                            <button onclick="addSchedule()" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                                <i class="fas fa-plus mr-2"></i> Add Schedule
                            </button>
                        </div>

                        <div class="overflow-x-auto">
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
                                <tbody>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">Monday</td>
                                        <td class="py-4 px-4">8:00 AM - 5:00 PM</td>
                                        <td class="py-4 px-4">LUMC - OPD Building</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Clinic Hours</span></td>
                                        <td class="py-4 px-4">
                                            <button class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                    <button class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-lg hover:bg-blue-700">
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

    <!-- MODALS -->

    <!-- Create Order Modal -->
    <div id="createOrderModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Create X-ray Order</h3>
                    <p class="text-sm text-gray-500 mt-1">Fill in the details for the diagnostic order</p>
                </div>
                <button onclick="closeModal('createOrderModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form onsubmit="submitOrder(event)">
                <div class="form-group">
                    <label class="form-label">Select Patient *</label>
                    <select id="orderPatient" class="form-select" required>
                        <option value="">Choose patient...</option>
                        <option value="Maria Clara Santos|P-2024-001">Maria Clara Santos (P-2024-001)</option>
                        <option value="Jose Rizal Cruz|P-2024-002">Jose Rizal Cruz (P-2024-002)</option>
                        <option value="Ana Reyes Dela Cruz|P-2024-003">Ana Reyes Dela Cruz (P-2024-003)</option>
                        <option value="Pedro Garcia Aquino|P-2024-004">Pedro Garcia Aquino (P-2024-004)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">X-ray Type *</label>
                    <select id="xrayType" class="form-select" required>
                        <option value="">Select type...</option>
                        <option value="Chest X-ray (PA View)">Chest X-ray (PA View)</option>
                        <option value="Chest X-ray (PA & Lateral)">Chest X-ray (PA & Lateral)</option>
                        <option value="Lumbar Spine (AP & Lateral)">Lumbar Spine (AP & Lateral)</option>
                        <option value="Cervical Spine (AP & Lateral)">Cervical Spine (AP & Lateral)</option>
                        <option value="Skull (AP & Lateral)">Skull (AP & Lateral)</option>
                        <option value="Abdomen (Supine & Upright)">Abdomen (Supine & Upright)</option>
                        <option value="Hand (AP & Oblique)">Hand (AP & Oblique)</option>
                        <option value="Foot (AP & Oblique)">Foot (AP & Oblique)</option>
                        <option value="Pelvis (AP View)">Pelvis (AP View)</option>
                        <option value="KUB (Kidneys, Ureters, Bladder)">KUB (Kidneys, Ureters, Bladder)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Clinical Indication *</label>
                    <textarea id="clinicalIndication" class="form-textarea" rows="3" placeholder="e.g., Chronic cough, rule out pneumonia" required></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select id="orderPriority" class="form-select">
                            <option value="routine">Routine</option>
                            <option value="urgent">Urgent</option>
                            <option value="stat">STAT (Immediate)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Preferred Date</label>
                        <input type="date" id="preferredDate" class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Additional Instructions (Optional)</label>
                    <textarea id="additionalInstructions" class="form-textarea" rows="2" placeholder="Any special instructions for the rad tech..."></textarea>
                </div>

                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeModal('createOrderModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                        <i class="fas fa-paper-plane mr-2"></i> Submit Order
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Review Results Modal -->
    <div id="reviewResultsModal" class="modal">
        <div class="modal-content" style="max-width: 1000px;">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Review X-ray Results</h3>
                    <p class="text-sm text-gray-500 mt-1" id="reviewPatientInfo"></p>
                </div>
                <button onclick="closeModal('reviewResultsModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="space-y-6">
                <!-- Order Details -->
                <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                    <div class="grid grid-cols-3 gap-4 text-sm">
                        <div>
                            <p class="text-xs text-blue-600 font-bold uppercase mb-1">Order ID</p>
                            <p class="font-bold text-gray-900" id="reviewOrderId">ORD-2024-001</p>
                        </div>
                        <div>
                            <p class="text-xs text-blue-600 font-bold uppercase mb-1">Exam Type</p>
                            <p class="font-bold text-gray-900" id="reviewExamType">Chest X-ray (PA & Lateral)</p>
                        </div>
                        <div>
                            <p class="text-xs text-blue-600 font-bold uppercase mb-1">Completed</p>
                            <p class="font-bold text-gray-900">Feb 13, 2026 8:15 AM</p>
                        </div>
                    </div>
                </div>

                <!-- X-ray Images -->
                <div>
                    <h4 class="text-lg font-bold text-gray-900 mb-3">X-ray Images</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="card p-4">
                            <p class="text-sm font-bold text-gray-700 mb-2">PA View</p>
                            <div class="bg-gray-900 rounded-lg flex items-center justify-center" style="height: 300px;">
                                <div class="text-center text-gray-400">
                                    <i class="fas fa-x-ray text-6xl mb-3"></i>
                                    <p class="text-sm">X-ray Image Preview</p>
                                    <p class="text-xs">(PA View)</p>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-blue-600 text-white text-sm font-bold rounded hover:bg-blue-700">
                                    <i class="fas fa-search-plus mr-1"></i> Zoom
                                </button>
                                <button class="flex-1 px-3 py-2 bg-gray-600 text-white text-sm font-bold rounded hover:bg-gray-700">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                            </div>
                        </div>
                        <div class="card p-4">
                            <p class="text-sm font-bold text-gray-700 mb-2">Lateral View</p>
                            <div class="bg-gray-900 rounded-lg flex items-center justify-center" style="height: 300px;">
                                <div class="text-center text-gray-400">
                                    <i class="fas fa-x-ray text-6xl mb-3"></i>
                                    <p class="text-sm">X-ray Image Preview</p>
                                    <p class="text-xs">(Lateral View)</p>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-blue-600 text-white text-sm font-bold rounded hover:bg-blue-700">
                                    <i class="fas fa-search-plus mr-1"></i> Zoom
                                </button>
                                <button class="flex-1 px-3 py-2 bg-gray-600 text-white text-sm font-bold rounded hover:bg-gray-700">
                                    <i class="fas fa-download mr-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Radiologist Report (If any) -->
                <div class="card p-4 bg-gray-50">
                    <h4 class="text-sm font-bold text-gray-700 mb-2">Rad Tech Notes</h4>
                    <p class="text-sm text-gray-700">Images acquired successfully. Patient cooperative. Good quality images obtained.</p>
                </div>

                <!-- Doctor's Interpretation Form -->
                <form onsubmit="submitInterpretation(event)">
                    <div class="form-group">
                        <label class="form-label">Your Findings / Impression *</label>
                        <textarea id="doctorFindings" class="form-textarea" rows="6" placeholder="Enter your radiological findings and clinical impression..." required></textarea>
                        <p class="text-xs text-gray-500 mt-1">This will be saved to the patient's medical record</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Recommended Actions</label>
                        <textarea id="recommendedActions" class="form-textarea" rows="3" placeholder="e.g., Follow-up in 2 weeks, Start antibiotics, Refer to specialist..."></textarea>
                    </div>

                    <div class="flex gap-3 mt-6">
                        <button type="button" onclick="closeModal('reviewResultsModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                            Cancel
                        </button>
                        <button type="submit" class="flex-1 px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                            <i class="fas fa-check-circle mr-2"></i> Save Interpretation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

    <!-- Order Details Modal -->
    <div id="orderDetailsModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Order Details</h3>
                <button onclick="closeModal('orderDetailsModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="orderDetailsContent">
                <div class="space-y-4">
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-xs font-bold text-gray-500 uppercase mb-1">Order ID</p>
                        <p class="font-bold text-gray-900">ORD-2024-001</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-xs font-bold text-gray-500 uppercase mb-1">Patient</p>
                            <p class="font-bold text-gray-900">Maria Clara Santos</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-xs font-bold text-gray-500 uppercase mb-1">Exam Type</p>
                            <p class="font-bold text-gray-900">Chest X-ray (PA & Lateral)</p>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-xs font-bold text-gray-500 uppercase mb-1">Clinical Indication</p>
                        <p class="text-gray-900">Chronic cough, rule out pneumonia</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-3 mt-6">
                <button onclick="closeModal('orderDetailsModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Schedule Modal -->
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

    <!-- Prescription Modal -->
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
        function showTab(tabName, event) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
            
            document.getElementById('tab-' + tabName).classList.add('active');
            if (event && event.target) {
                event.target.closest('.nav-item').classList.add('active');
            } else {
                // Fallback: activate the matching nav item by data attribute or text
                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach(item => {
                    if (item.getAttribute('onclick')?.includes(tabName)) {
                        item.classList.add('active');
                    }
                });
            }
            
            const titles = {
                'dashboard': 'Doctor Dashboard',
                'appointments': 'My Appointments',
                'diagnostic-orders': 'Diagnostic Orders',
                'patients': 'My Patients',
                'approvals': 'Pending Approvals',
                'schedule': 'My Schedule',
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

        // Filter Orders
        function filterOrders(status, event) {
            const items = document.querySelectorAll('.order-item');
            const buttons = document.querySelectorAll('.orders-filter-btn');
            
            buttons.forEach(btn => btn.classList.remove('active', 'bg-green-600', 'text-white'));
            if (event && event.target) {
                event.target.classList.add('active', 'bg-green-600', 'text-white');
            }
            
            items.forEach(item => {
                if (status === 'all' || item.dataset.status === status) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Create Order Modal
        function openCreateOrderModal() {
            document.getElementById('createOrderModal').classList.add('show');
        }

        // Submit Order
        function submitOrder(e) {
            e.preventDefault();
            const patient = document.getElementById('orderPatient').value.split('|')[0];
            const xrayType = document.getElementById('xrayType').value;
            showSuccess('X-ray order created successfully for ' + patient + '!');
            closeModal('createOrderModal');
            // In real app, this would send data to backend
        }

        // Review Results
        function reviewResults(orderId, patientName, examType) {
            document.getElementById('reviewPatientInfo').textContent = patientName + ' - ' + examType;
            document.getElementById('reviewOrderId').textContent = orderId;
            document.getElementById('reviewExamType').textContent = examType;
            document.getElementById('reviewResultsModal').classList.add('show');
        }

        // Submit Interpretation
        function submitInterpretation(e) {
            e.preventDefault();
            const findings = document.getElementById('doctorFindings').value;
            if (findings.trim()) {
                showSuccess('Interpretation saved successfully and added to patient record!');
                closeModal('reviewResultsModal');
                // Update order status to "Reviewed"
                // In real app, this would save to backend
            }
        }

        // View Order Details
        function viewOrderDetails(orderId) {
            document.getElementById('orderDetailsModal').classList.add('show');
        }

        // Cancel Order
        function cancelOrder(orderId) {
            if (confirm('Are you sure you want to cancel this order?')) {
                showSuccess('Order ' + orderId + ' has been cancelled.');
            }
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

        function writePrescription() {
            document.getElementById('prescriptionModal').classList.add('show');
        }

        function savePrescription(e) {
            e.preventDefault();
            showSuccess('Prescription saved successfully!');
            closeModal('prescriptionModal');
        }

        function showNotifications() {
            alert('Notifications:\n\n• 3 X-ray results ready for review\n• 1 urgent order pending\n• 2 new patient messages');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('show');
            }
        }

        // Initialize filter buttons
        document.addEventListener('DOMContentLoaded', function() {
            const allBtn = document.querySelector('[data-filter="all"]');
            if (allBtn) {
                allBtn.classList.add('bg-green-600', 'text-white');
            }
        });
    </script>
</body>
</html>