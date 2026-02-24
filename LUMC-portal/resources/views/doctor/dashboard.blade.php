<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - LUMC Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }
        
        body {
            background: #f8fafc; /* Refined background color [cite: 95] */
            margin: 0;
        }

        /* Modernized Sidebar: Deep Navy instead of Green Gradient  */
        .sidebar {
            background: #0f172a; 
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.05);
        }

        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            color: #94a3b8;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            transform: translateX(4px);
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid #10b981; /* LUMC Green accent [cite: 99] */
        }

        /* Enhanced Card Shadow & Depth [cite: 100, 101] */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid #f1f5f9;
        }

        .tab-content { display: none; }
        .tab-content.active { display: block; animation: fadeIn 0.4s ease-out; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Modernized Modal with Backdrop Blur [cite: 104, 105, 107] */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background-color: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
        }

        .modal.show { display: flex; align-items: center; justify-content: center; }

        .modal-content {
            background: white;
            padding: 32px;
            border-radius: 20px;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-height: 90vh;
            overflow-y: auto;
        }

        /* High Contrast Form Focus [cite: 114, 116, 117] */
        .form-input:focus {
            outline: none;
            border-color: #10b981;
            ring: 3px;
            ring-color: rgba(16, 185, 129, 0.2);
        }

        /* Status Pill Refinement [cite: 124-128] */
        .badge {
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        .badge-urgent { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; animation: pulse 2s infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.7; } }
    </style>
</head>

<body>
    <div class="flex min-h-screen">

        <aside class="sidebar w-64 text-white fixed h-full flex flex-col">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-emerald-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-hospital text-xl"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-lg leading-tight">LUMC</h2>
                        <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">Portal</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-1 flex-1">
                <div class="nav-item active flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium" onclick="showTab('dashboard')">
                    <i class="fa-solid fa-gauge-high w-5"></i><span>Overview</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium" onclick="showTab('appointments')">
                    <i class="fa-solid fa-calendar-check w-5"></i><span>Appointments</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium relative" onclick="showTab('diagnostic-orders')">
                    <i class="fa-solid fa-microscope w-5"></i><span>Lab Orders</span>
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 bg-red-500 text-[10px] font-bold px-1.5 py-0.5 rounded-md">3</span>
                </div>
                <div class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium" onclick="showTab('patients')">
                    <i class="fa-solid fa-hospital-user w-5"></i><span>My Patients</span>
                </div>
            </nav>

            <div class="p-4 border-t border-white/10">
                <button class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-400 hover:text-red-400">
                    <i class="fa-solid fa-arrow-right-from-bracket w-5"></i><span>Sign Out</span>
                </button>
            </div>
        </aside>

        <main class="flex-1 ml-64">
            <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-10">
                <div class="flex items-center justify-between px-8 py-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-900" id="pageTitle">Dashboard</h1>
                        <p class="text-xs text-slate-500">Welcome back, Dr. Santos</p>
                    </div>
                    <div class="flex items-center gap-6">
                        <button class="relative p-2 text-slate-400 hover:bg-slate-50 rounded-lg transition">
                            <i class="fa-regular fa-bell text-lg"></i>
                            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                        </button>
                        <div class="flex items-center gap-3 pl-6 border-l border-slate-200">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-bold text-slate-900 leading-none">Ricardo Santos, M.D.</p>
                                <p class="text-[10px] text-slate-500 mt-1">Internal Medicine</p>
                            </div>
                            <div class="w-10 h-10 bg-slate-100 border border-slate-200 rounded-full flex items-center justify-center text-slate-700 font-bold text-sm">
                                RS
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-8 max-w-7xl mx-auto">
                <div id="tab-dashboard" class="tab-content active">
                    <div class="card p-8 bg-slate-900 text-white mb-8 relative overflow-hidden">
                        <div class="relative z-10 flex items-center justify-between">
                            <div>
                                <h2 class="text-3xl font-bold mb-2">Good afternoon, Dr. Santos!</h2>
                                <p class="text-slate-400">You have <span class="text-emerald-400 font-bold">5 appointments</span> and 3 urgent lab results pending.</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-slate-400 uppercase tracking-tighter">Friday, Feb 13</p>
                                <p class="text-2xl font-bold">02:30 PM</p>
                            </div>
                        </div>
                        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="card p-6 hover:translate-y-[-4px] transition-all">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                                    <i class="fa-solid fa-calendar-day text-xl"></i>
                                </div>
                                <span class="text-2xl font-black text-slate-900">05</span>
                            </div>
                            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Today's Visits</h3>
                        </div>

                        <div class="card p-6 hover:translate-y-[-4px] transition-all">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                                    <i class="fa-solid fa-flask-vial text-xl"></i>
                                </div>
                                <span class="text-2xl font-black text-slate-900">07</span>
                            </div>
                            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Lab Orders</h3>
                        </div>

                        <div class="card p-6 border-b-4 border-b-emerald-500 hover:translate-y-[-4px] transition-all">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                                    <i class="fa-solid fa-clipboard-check text-xl"></i>
                                </div>
                                <span class="text-2xl font-black text-slate-900">03</span>
                            </div>
                            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Results Ready</h3>
                        </div>

                        <div class="card p-6 border-b-4 border-b-red-500 hover:translate-y-[-4px] transition-all">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center">
                                    <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                                </div>
                                <span class="text-2xl font-black text-slate-900">01</span>
                            </div>
                            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Urgent Cases</h3>
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="font-bold text-slate-900">Next Appointments</h3>
                            <button onclick="showTab('appointments')" class="text-xs font-bold text-emerald-600 hover:underline">View All</button>
                        </div>
                        <table class="w-full">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-wider">Time</th>
                                    <th class="px-6 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-wider">Patient</th>
                                    <th class="px-6 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-right text-[10px] font-bold text-slate-400 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="px-6 py-4 text-sm font-bold text-slate-900">09:00 AM</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold text-slate-600">MS</div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-900">Maria Clara Santos</p>
                                                <p class="text-[10px] text-slate-500">P-2024-001</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-slate-600 font-medium">General Checkup</td>
                                    <td class="px-6 py-4">
                                        <span class="badge bg-amber-50 text-amber-600 border border-amber-100">Waiting</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-bold py-2 px-4 rounded-lg transition-all">
                                            Start Consult
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                </div>
        </main>
    </div>

    <script>
        function showTab(tabId) {
            // Updated Tab Logic with Title Updates [cite: 138]
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
            
            document.getElementById('tab-' + tabId).classList.add('active');
            event.currentTarget.classList.add('active');
            
            // Dynamic page title updates
            const titles = {
                'dashboard': 'Overview',
                'appointments': 'Appointments',
                'diagnostic-orders': 'Lab Orders',
                'patients': 'Patient Directory'
            };
            document.getElementById('pageTitle').innerText = titles[tabId] || 'Portal';
        }
    </script>
</body>
</html>