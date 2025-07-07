@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Settings</h1>
        <p class="text-gray-600">Configure your IoT monitoring system</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Settings Navigation -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Configuration</h2>
                <ul class="space-y-2">
                    <li>
                        <a href="#sensor-config" class="flex items-center p-2 bg-green-50 text-green-700 rounded-md hover:bg-green-100 transition duration-150">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Sensor Configuration
                        </a>
                    </li>
                    <li>
                        <a href="#alert-settings" class="flex items-center p-2 rounded-md hover:bg-gray-100 transition duration-150">
                            <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            Alert Settings
                        </a>
                    </li>
                    <li>
                        <a href="#data-management" class="flex items-center p-2 rounded-md hover:bg-gray-100 transition duration-150">
                            <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Data Management
                        </a>
                    </li>
                    <li>
                        <a href="#device-management" class="flex items-center p-2 rounded-md hover:bg-gray-100 transition duration-150">
                            <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                            Device Management
                        </a>
                    </li>
                    <li>
                        <a href="#system-settings" class="flex items-center p-2 rounded-md hover:bg-gray-100 transition duration-150">
                            <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                            </svg>
                            System Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="lg:col-span-2">
            <!-- Sensor Configuration -->
            <div id="sensor-config" class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Sensor Configuration</h2>
                
                <form>
                    <!-- Temperature Sensor -->
                    <div class="p-4 border rounded-md mb-4">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">DS18B20 Temperature Sensor</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Reading Interval (seconds)</label>
                                <input type="number" class="w-full px-3 py-2 border rounded-md" value="30">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Calibration Offset (°C)</label>
                                <input type="number" step="0.1" class="w-full px-3 py-2 border rounded-md" value="0.0">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alert Threshold - Low (°C)</label>
                                <input type="number" step="0.1" class="w-full px-3 py-2 border rounded-md" value="20.0">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alert Threshold - High (°C)</label>
                                <input type="number" step="0.1" class="w-full px-3 py-2 border rounded-md" value="30.0">
                            </div>
                        </div>
                    </div>
                    
                    <!-- pH Sensor -->
                    <div class="p-4 border rounded-md mb-4">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">pH Sensor</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Reading Interval (seconds)</label>
                                <input type="number" class="w-full px-3 py-2 border rounded-md" value="60">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Calibration Offset</label>
                                <input type="number" step="0.01" class="w-full px-3 py-2 border rounded-md" value="0.00">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alert Threshold - Low</label>
                                <input type="number" step="0.1" class="w-full px-3 py-2 border rounded-md" value="6.0">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alert Threshold - High</label>
                                <input type="number" step="0.1" class="w-full px-3 py-2 border rounded-md" value="8.0">
                            </div>
                        </div>
                    </div>
                    
                    <!-- TDS Sensor -->
                    <div class="p-4 border rounded-md mb-4">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">TDS Sensor</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Reading Interval (seconds)</label>
                                <input type="number" class="w-full px-3 py-2 border rounded-md" value="60">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Calibration Factor</label>
                                <input type="number" step="0.01" class="w-full px-3 py-2 border rounded-md" value="1.00">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alert Threshold - Low (ppm)</label>
                                <input type="number" class="w-full px-3 py-2 border rounded-md" value="100">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alert Threshold - High (ppm)</label>
                                <input type="number" class="w-full px-3 py-2 border rounded-md" value="1000">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="button" class="mr-2 px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100 transition duration-150">Reset</button>
                        <button type="button" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-150">Save Changes</button>
                    </div>
                </form>
            </div>
            
            <!-- Docker Configuration Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Docker Container Management</h2>
                <p class="text-gray-600 mb-4">Configure and monitor your Docker containers for each sensor</p>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Container</th>
                                <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Port</th>
                                <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">CPU / Memory</th>
                                <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b text-sm">temp-sensor</td>
                                <td class="py-3 px-4 border-b text-sm">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Running</span>
                                </td>
                                <td class="py-3 px-4 border-b text-sm">8080</td>
                                <td class="py-3 px-4 border-b text-sm">0.2% / 45MB</td>
                                <td class="py-3 px-4 border-b text-sm">
                                    <div class="flex space-x-2">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b text-sm">ph-sensor</td>
                                <td class="py-3 px-4 border-b text-sm">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Running</span>
                                </td>
                                <td class="py-3 px-4 border-b text-sm">8081</td>
                                <td class="py-3 px-4 border-b text-sm">0.1% / 40MB</td>
                                <td class="py-3 px-4 border-b text-sm">
                                    <div class="flex space-x-2">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b text-sm">tds-sensor</td>
                                <td class="py-3 px-4 border-b text-sm">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Running</span>
                                </td>
                                <td class="py-3 px-4 border-b text-sm">8082</td>
                                <td class="py-3 px-4 border-b text-sm">0.1% / 38MB</td>
                                <td class="py-3 px-4 border-b text-sm">
                                    <div class="flex space-x-2">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-150 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add New Container
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 