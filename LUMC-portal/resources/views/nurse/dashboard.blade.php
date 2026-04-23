<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NICU Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50">

<div class="p-6">

    <!-- HEADER -->
    <h1 class="text-2xl font-bold mb-1 text-pink-600">💗 NICU Dashboard</h1>
    <p class="text-gray-500 mb-6">Neonatal Intensive Care Unit Monitoring</p>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        
        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">NICU Patients</p>
            <h2 class="text-2xl font-bold">12</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Pending Orders</p>
            <h2 class="text-2xl font-bold">7</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Critical Cases</p>
            <h2 class="text-2xl font-bold text-red-500">2</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Feeding Due</p>
            <h2 class="text-2xl font-bold text-pink-500">5</h2>
        </div>

    </div>

    <!-- SEARCH -->
    <div class="flex flex-col md:flex-row gap-4 mb-4">
        <input type="text" placeholder="Search baby name or ID..."
            class="w-full p-2 border rounded-lg">

        <select class="p-2 border rounded-lg">
            <option>All Status</option>
            <option>Critical</option>
            <option>Stable</option>
            <option>Improving</option>
        </select>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-pink-100 text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th>Baby</th>
                    <th>Age</th>
                    <th>Diagnosis</th>
                    <th>Status</th>
                    <th>Feeding</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr class="border-t hover:bg-pink-50">
                    <td class="p-3">1</td>
                    <td>
                        <strong>Baby Girl D.</strong><br>
                        <span class="text-gray-400 text-xs">NICU-00012</span>
                    </td>
                    <td>
                        34 weeks<br>
                        <span class="text-gray-400 text-xs">2 days old</span>
                    </td>
                    <td>Prematurity / LBW</td>
                    <td>
                        <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-xs">
                            Critical
                        </span>
                    </td>
                    <td>
                        09:00 AM<br>
                        <span class="text-red-500 text-xs">Due soon</span>
                    </td>
                    <td>
                        <button class="text-blue-500">View</button>
                    </td>
                </tr>

                <tr class="border-t hover:bg-pink-50">
                    <td class="p-3">2</td>
                    <td>
                        <strong>Baby Girl M.</strong><br>
                        <span class="text-gray-400 text-xs">NICU-00011</span>
                    </td>
                    <td>
                        36 weeks<br>
                        <span class="text-gray-400 text-xs">3 days old</span>
                    </td>
                    <td>RDS Mild</td>
                    <td>
                        <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">
                            Stable
                        </span>
                    </td>
                    <td>
                        11:00 AM<br>
                        <span class="text-gray-400 text-xs">Later</span>
                    </td>
                    <td>
                        <button class="text-blue-500">View</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>