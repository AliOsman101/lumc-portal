<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome, ' . auth()->user()->name . '!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 text-white overflow-hidden shadow-lg sm:rounded-lg mb-6">
                <div class="p-8">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-check-circle text-4xl text-yellow-400"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Account Created Successfully!</h3>
                            <p class="text-blue-100">You are now logged in to your LUMC Patient Portal. Welcome aboard!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <!-- Book Appointment -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-check text-red-600 text-xl"></i>
                            </div>
                            <h4 class="font-bold text-lg">Book Appointment</h4>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Schedule an appointment with one of our specialist doctors.</p>
                        <a href="#" class="text-red-600 font-semibold hover:text-red-700">Book Now →</a>
                    </div>
                </div>

                <!-- View Medical Records -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-medical text-blue-900 text-xl"></i>
                            </div>
                            <h4 class="font-bold text-lg">Medical Records</h4>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Access your medical history, test results, and prescriptions.</p>
                        <a href="#" class="text-blue-900 font-semibold hover:text-blue-800">View Records →</a>
                    </div>
                </div>

                <!-- Contact Support -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-headset text-green-600 text-xl"></i>
                            </div>
                            <h4 class="font-bold text-lg">Contact Support</h4>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Need help? Reach out to our support team.</p>
                        <a href="#" class="text-green-600 font-semibold hover:text-green-700">Get Support →</a>
                    </div>
                </div>

            </div>

            <!-- Account Information Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-6">Account Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Full Name</p>
                            <p class="text-lg font-bold text-blue-900">{{ auth()->user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Email Address</p>
                            <p class="text-lg font-bold text-blue-900">{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Account Status</p>
                            <p class="text-lg font-bold text-green-600">Active</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Member Since</p>
                            <p class="text-lg font-bold text-blue-900">{{ auth()->user()->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('profile.edit') }}" class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition">
                            Edit Profile
                        </a>
                        <a href="{{ route('password.update') }}" class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Change Password
                        </a>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border-l-4 border-blue-900 p-6 mt-6 rounded">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <i class="fas fa-lightbulb"></i> Next Steps
                </h4>
                <ul class="space-y-2 text-gray-700 text-sm">
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Complete your patient profile with detailed medical information</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Book your first appointment with a specialist</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Upload any existing medical documents for reference</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        <span>Enable notifications for appointment reminders</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
