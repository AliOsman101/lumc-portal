<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LUMC Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(135deg, #f8fafc 0%, #ede9fe 100%); margin: 0; }
        .sidebar { background: linear-gradient(180deg, #7c3aed 0%, #8b5cf6 100%); box-shadow: 2px 0 10px rgba(0,0,0,.1); }
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
        .form-input, .form-select { width: 100%; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 15px; transition: all 0.2s; }
        .form-input:focus, .form-select:focus { outline: none; border-color: #7c3aed; box-shadow: 0 0 0 3px rgba(124,58,237,0.1); }
        
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
                    <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="LUMC" class="h-12 w-12">
                    <div>
                        <h2 class="font-black text-lg">LUMC</h2>
                        <p class="text-xs text-white/70">Admin Portal</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-2">
                <div class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('dashboard')">
                    <i class="fas fa-home w-5"></i><span>Dashboard</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('users')">
                    <i class="fas fa-users w-5"></i><span>All Users</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('doctors')">
                    <i class="fas fa-user-md w-5"></i><span>Doctors</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('nurses')">
                    <i class="fas fa-user-nurse w-5"></i><span>Nurses</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('patients')">
                    <i class="fas fa-user-injured w-5"></i><span>Patients</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('appointments')">
                    <i class="fas fa-calendar-alt w-5"></i><span>Appointments</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('reports')">
                    <i class="fas fa-chart-bar w-5"></i><span>Reports</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold" onclick="showTab('settings')">
                    <i class="fas fa-cog w-5"></i><span>Settings</span>
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
                        <h1 class="text-2xl font-black text-gray-900" id="pageTitle">Admin Dashboard</h1>
                        <p class="text-sm text-gray-500">System Administrator</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="relative p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-bold text-gray-900">Admin User</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-[#7c3aed] to-[#8b5cf6] rounded-full flex items-center justify-center text-white font-bold">
                                A
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
                    <div class="card p-6 bg-gradient-to-r from-[#7c3aed] to-[#8b5cf6] text-white mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-2">Welcome, Admin! 🔐</h2>
                                <p class="text-white/90">Manage the entire LUMC Portal system from here.</p>
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
                                    <i class="fas fa-users text-blue-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">1,248</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Total Users</h3>
                            <p class="text-xs text-gray-500 mt-1">All active accounts</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-green-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-md text-green-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">42</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Doctors</h3>
                            <p class="text-xs text-gray-500 mt-1">Active physicians</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-red-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-nurse text-red-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">128</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Nurses</h3>
                            <p class="text-xs text-gray-500 mt-1">Registered nurses</p>
                        </div>

                        <div class="card p-6 border-l-4 border-l-yellow-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-injured text-yellow-600 text-xl"></i>
                                </div>
                                <span class="text-3xl font-black text-gray-900">1,078</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-600 uppercase">Patients</h3>
                            <p class="text-xs text-gray-500 mt-1">Registered patients</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid md:grid-cols-4 gap-4">
                        <button onclick="createUser()" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-user-plus text-blue-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Create User</h4>
                        </button>
                        <button onclick="showTab('users')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-users text-green-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Manage Users</h4>
                        </button>
                        <button onclick="showTab('reports')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-chart-bar text-purple-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">View Reports</h4>
                        </button>
                        <button onclick="showTab('settings')" class="card p-6 hover:shadow-xl transition text-center">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-cog text-gray-600 text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900">Settings</h4>
                        </button>
                    </div>
                </div>

                <!-- TAB 2: All Users -->
                <div id="tab-users" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">All Users (1,248)</h3>
                            <div class="flex gap-3">
                                <input type="text" placeholder="Search users..." class="px-4 py-2 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none" onkeyup="searchUsers(this.value)">
                                <button onclick="createUser()" class="px-6 py-2 bg-purple-600 text-white font-bold rounded-lg hover:bg-purple-700">
                                    <i class="fas fa-user-plus mr-2"></i> Add New User
                                </button>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full" id="usersTable">
                                <thead>
                                    <tr class="border-b-2 border-gray-200">
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Name</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Email</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Role</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Status</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50 user-row">
                                        <td class="py-4 px-4 font-semibold text-gray-900">Dr. Ricardo Santos</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">r.santos@lumc.ph</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Doctor</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Active</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="editUser('Dr. Ricardo Santos')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteUser('Dr. Ricardo Santos')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-100 hover:bg-gray-50 user-row">
                                        <td class="py-4 px-4 font-semibold text-gray-900">Teresa Gomez</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">t.gomez@lumc.ph</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">Nurse</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Active</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="editUser('Teresa Gomez')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteUser('Teresa Gomez')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-100 hover:bg-gray-50 user-row">
                                        <td class="py-4 px-4 font-semibold text-gray-900">Maria Clara Santos</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">maria.santos@gmail.com</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Patient</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Active</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="editUser('Maria Clara Santos')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteUser('Maria Clara Santos')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-100 hover:bg-gray-50 user-row">
                                        <td class="py-4 px-4 font-semibold text-gray-900">Dr. Carmen Aguilar</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">c.aguilar@lumc.ph</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Doctor</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Active</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="editUser('Dr. Carmen Aguilar')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteUser('Dr. Carmen Aguilar')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>

                                    <tr class="border-b border-gray-100 hover:bg-gray-50 user-row">
                                        <td class="py-4 px-4 font-semibold text-gray-900">Jose Rizal Cruz</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">jose.cruz@gmail.com</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Patient</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">Pending</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <button onclick="editUser('Jose Rizal Cruz')" class="text-blue-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteUser('Jose Rizal Cruz')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: Doctors -->
                <div id="tab-doctors" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Doctors (42)</h3>
                            <button onclick="createDoctor()" class="px-6 py-2 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
                                <i class="fas fa-user-md mr-2"></i> Add Doctor
                            </button>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Doctor Card 1 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-green-500 hover:shadow-lg transition">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        RS
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Dr. Ricardo Santos</h4>
                                        <p class="text-xs text-gray-500">License: PRC-123456</p>
                                        <div class="mt-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded">Internal Medicine</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">r.santos@lumc.ph</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <button onclick="editUser('Dr. Ricardo Santos')" class="flex-1 px-3 py-2 bg-blue-600 text-white text-xs font-bold rounded hover:bg-blue-700">Edit</button>
                                    <button onclick="deleteUser('Dr. Ricardo Santos')" class="flex-1 px-3 py-2 bg-red-600 text-white text-xs font-bold rounded hover:bg-red-700">Delete</button>
                                </div>
                            </div>

                            <!-- Doctor Card 2 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-green-500 hover:shadow-lg transition">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        CA
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Dr. Carmen Aguilar</h4>
                                        <p class="text-xs text-gray-500">License: PRC-234567</p>
                                        <div class="mt-2">
                                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-bold rounded">Cardiology</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">c.aguilar@lumc.ph</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <button onclick="editUser('Dr. Carmen Aguilar')" class="flex-1 px-3 py-2 bg-blue-600 text-white text-xs font-bold rounded hover:bg-blue-700">Edit</button>
                                    <button onclick="deleteUser('Dr. Carmen Aguilar')" class="flex-1 px-3 py-2 bg-red-600 text-white text-xs font-bold rounded hover:bg-red-700">Delete</button>
                                </div>
                            </div>

                            <!-- Doctor Card 3 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-green-500 hover:shadow-lg transition">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        MR
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Dr. Maria Reyes</h4>
                                        <p class="text-xs text-gray-500">License: PRC-345678</p>
                                        <div class="mt-2">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded">Pediatrics</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">m.reyes@lumc.ph</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <button onclick="editUser('Dr. Maria Reyes')" class="flex-1 px-3 py-2 bg-blue-600 text-white text-xs font-bold rounded hover:bg-blue-700">Edit</button>
                                    <button onclick="deleteUser('Dr. Maria Reyes')" class="flex-1 px-3 py-2 bg-red-600 text-white text-xs font-bold rounded hover:bg-red-700">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: Nurses -->
                <div id="tab-nurses" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Nurses (128)</h3>
                            <button onclick="createNurse()" class="px-6 py-2 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700">
                                <i class="fas fa-user-nurse mr-2"></i> Add Nurse
                            </button>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Nurse Card 1 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        TG
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Teresa Gomez</h4>
                                        <p class="text-xs text-gray-500">License: PRC-345678</p>
                                        <div class="mt-2">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded">Active</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">t.gomez@lumc.ph</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <button onclick="editUser('Teresa Gomez')" class="flex-1 px-3 py-2 bg-blue-600 text-white text-xs font-bold rounded hover:bg-blue-700">Edit</button>
                                    <button onclick="deleteUser('Teresa Gomez')" class="flex-1 px-3 py-2 bg-red-600 text-white text-xs font-bold rounded hover:bg-red-700">Delete</button>
                                </div>
                            </div>

                            <!-- Nurse Card 2 -->
                            <div class="card p-5 border-2 border-gray-200 hover:border-red-500 hover:shadow-lg transition">
                                <div class="flex items-start gap-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        AR
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">Ana Reyes</h4>
                                        <p class="text-xs text-gray-500">License: PRC-456789</p>
                                        <div class="mt-2">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded">Active</span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2">a.reyes@lumc.ph</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <button onclick="editUser('Ana Reyes')" class="flex-1 px-3 py-2 bg-blue-600 text-white text-xs font-bold rounded hover:bg-blue-700">Edit</button>
                                    <button onclick="deleteUser('Ana Reyes')" class="flex-1 px-3 py-2 bg-red-600 text-white text-xs font-bold rounded hover:bg-red-700">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 5: Patients -->
                <div id="tab-patients" class="tab-content">
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Patients (1,078)</h3>
                            <button onclick="createPatient()" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                                <i class="fas fa-user-injured mr-2"></i> Add Patient
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-200">
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Patient ID</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Name</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Blood Type</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Status</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">P-2024-001</td>
                                        <td class="py-4 px-4 text-gray-900">Maria Clara Santos</td>
                                        <td class="py-4 px-4"><span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-bold rounded">O+</span></td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Active</span></td>
                                        <td class="py-4 px-4">
                                            <button onclick="viewPatientDetails('Maria Clara Santos')" class="text-blue-600 hover:underline text-sm font-bold mr-3">View</button>
                                            <button onclick="editUser('Maria Clara Santos')" class="text-green-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteUser('Maria Clara Santos')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4 font-semibold">P-2024-002</td>
                                        <td class="py-4 px-4 text-gray-900">Jose Rizal Cruz</td>
                                        <td class="py-4 px-4"><span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-bold rounded">A+</span></td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Active</span></td>
                                        <td class="py-4 px-4">
                                            <button onclick="viewPatientDetails('Jose Rizal Cruz')" class="text-blue-600 hover:underline text-sm font-bold mr-3">View</button>
                                            <button onclick="editUser('Jose Rizal Cruz')" class="text-green-600 hover:underline text-sm font-bold mr-3">Edit</button>
                                            <button onclick="deleteUser('Jose Rizal Cruz')" class="text-red-600 hover:underline text-sm font-bold">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 6: Appointments -->
                <div id="tab-appointments" class="tab-content">
                    <div class="card p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">All Appointments</h3>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-200">
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Date & Time</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Patient</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Doctor</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Type</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Status</th>
                                        <th class="text-left py-3 px-4 text-xs font-bold text-gray-600 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4">
                                            <div class="font-semibold">Feb 15, 2024</div>
                                            <div class="text-xs text-gray-500">10:00 AM</div>
                                        </td>
                                        <td class="py-4 px-4 text-gray-900">Maria Clara Santos</td>
                                        <td class="py-4 px-4 text-gray-900">Dr. Ricardo Santos</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">General Checkup</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Confirmed</span></td>
                                        <td class="py-4 px-4">
                                            <button onclick="viewAppointmentDetails('Maria Clara Santos')" class="text-blue-600 hover:underline text-sm font-bold mr-3">View</button>
                                            <button onclick="cancelAppointment('Maria Clara Santos')" class="text-red-600 hover:underline text-sm font-bold">Cancel</button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4">
                                            <div class="font-semibold">Feb 22, 2024</div>
                                            <div class="text-xs text-gray-500">2:30 PM</div>
                                        </td>
                                        <td class="py-4 px-4 text-gray-900">Jose Rizal Cruz</td>
                                        <td class="py-4 px-4 text-gray-900">Dr. Carmen Aguilar</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">Follow-up</td>
                                        <td class="py-4 px-4"><span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Scheduled</span></td>
                                        <td class="py-4 px-4">
                                            <button onclick="viewAppointmentDetails('Jose Rizal Cruz')" class="text-blue-600 hover:underline text-sm font-bold mr-3">View</button>
                                            <button onclick="cancelAppointment('Jose Rizal Cruz')" class="text-red-600 hover:underline text-sm font-bold">Cancel</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: Reports -->
                <div id="tab-reports" class="tab-content">
                    <div class="card p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">System Reports & Analytics</h3>

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div class="card p-6 bg-gradient-to-br from-blue-500 to-blue-600 text-white">
                                <h4 class="font-bold text-lg mb-3">Monthly Statistics</h4>
                                <div class="text-4xl font-black mb-2">478</div>
                                <p class="text-white/90">Total appointments this month</p>
                            </div>

                            <div class="card p-6 bg-gradient-to-br from-green-500 to-green-600 text-white">
                                <h4 class="font-bold text-lg mb-3">Revenue</h4>
                                <div class="text-4xl font-black mb-2">₱1.2M</div>
                                <p class="text-white/90">Total revenue this month</p>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4">
                            <button class="card p-6 hover:shadow-xl transition text-center border-2 border-gray-200">
                                <i class="fas fa-chart-line text-blue-600 text-3xl mb-3"></i>
                                <h5 class="font-bold text-gray-900">User Growth Report</h5>
                            </button>
                            <button class="card p-6 hover:shadow-xl transition text-center border-2 border-gray-200">
                                <i class="fas fa-file-invoice text-green-600 text-3xl mb-3"></i>
                                <h5 class="font-bold text-gray-900">Financial Report</h5>
                            </button>
                            <button class="card p-6 hover:shadow-xl transition text-center border-2 border-gray-200">
                                <i class="fas fa-calendar-check text-purple-600 text-3xl mb-3"></i>
                                <h5 class="font-bold text-gray-900">Appointments Report</h5>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- TAB 8: Settings -->
                <div id="tab-settings" class="tab-content">
                    <div class="card p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">System Settings</h3>

                        <div class="space-y-6">
                            <!-- General Settings -->
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-4">General Settings</h4>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-semibold text-gray-900">Hospital Name</p>
                                            <p class="text-sm text-gray-500">La Union Medical Center</p>
                                        </div>
                                        <button class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-sm">Edit</button>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-semibold text-gray-900">System Email</p>
                                            <p class="text-sm text-gray-500">info@lumc.ph</p>
                                        </div>
                                        <button class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-sm">Edit</button>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-semibold text-gray-900">Contact Number</p>
                                            <p class="text-sm text-gray-500">(072) 242-5445</p>
                                        </div>
                                        <button class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 text-sm">Edit</button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Maintenance -->
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-4">System Maintenance</h4>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <button class="p-4 bg-yellow-50 border-2 border-yellow-500 rounded-lg hover:shadow-lg transition text-left">
                                        <i class="fas fa-database text-yellow-600 text-2xl mb-2"></i>
                                        <h5 class="font-bold text-gray-900">Backup Database</h5>
                                        <p class="text-sm text-gray-600">Last backup: 2 hours ago</p>
                                    </button>

                                    <button class="p-4 bg-red-50 border-2 border-red-500 rounded-lg hover:shadow-lg transition text-left">
                                        <i class="fas fa-broom text-red-600 text-2xl mb-2"></i>
                                        <h5 class="font-bold text-gray-900">Clear Cache</h5>
                                        <p class="text-sm text-gray-600">Optimize system performance</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Create User Modal -->
    <div id="createUserModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Create New User</h3>
                <button onclick="closeModal('createUserModal')" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form onsubmit="saveUser(event)">
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-input" placeholder="e.g., Juan Dela Cruz" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" placeholder="email@example.com" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select class="form-select" required>
                            <option value="">Select role...</option>
                            <option value="admin">Admin</option>
                            <option value="doctor">Doctor</option>
                            <option value="nurse">Nurse</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-input" placeholder="••••••••" required>
                    </div>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeModal('createUserModal')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-purple-600 text-white font-bold rounded-lg hover:bg-purple-700">
                        Create User
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
                'dashboard': 'Admin Dashboard',
                'users': 'All Users',
                'doctors': 'Doctors',
                'nurses': 'Nurses',
                'patients': 'Patients',
                'appointments': 'Appointments',
                'reports': 'Reports & Analytics',
                'settings': 'System Settings'
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

        // User Management
        function createUser() {
            document.getElementById('createUserModal').classList.add('show');
        }

        function createDoctor() {
            document.getElementById('createUserModal').classList.add('show');
        }

        function createNurse() {
            document.getElementById('createUserModal').classList.add('show');
        }

        function createPatient() {
            document.getElementById('createUserModal').classList.add('show');
        }

        function saveUser(e) {
            e.preventDefault();
            showSuccess('User created successfully!');
            closeModal('createUserModal');
        }

        function editUser(name) {
            showSuccess('Opening editor for ' + name + '...');
        }

        function deleteUser(name) {
            if (confirm('Are you sure you want to delete ' + name + '?')) {
                showSuccess(name + ' deleted successfully.');
            }
        }

        function viewPatientDetails(name) {
            showSuccess('Viewing details for ' + name);
        }

        function viewAppointmentDetails(patient) {
            showSuccess('Viewing appointment for ' + patient);
        }

        function cancelAppointment(patient) {
            if (confirm('Cancel appointment for ' + patient + '?')) {
                showSuccess('Appointment cancelled.');
            }
        }

        // Search Users
        function searchUsers(query) {
            const rows = document.querySelectorAll('.user-row');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query.toLowerCase()) ? '' : 'none';
            });
        }

        // Modal Functions
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