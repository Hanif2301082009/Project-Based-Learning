@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">IoT Monitoring Dashboard</h1>
        <p class="text-gray-600">Real-time sensor data from your ESP8266 deployment</p>
    </div>

    <!-- Overview Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Temperature Card -->
        <div class="bg-white rounded-lg shadow-md p-6 sensor-card border-t-4 border-red-500">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Temperature</h2>
                    <p class="text-gray-500 text-sm">DS18B20 Sensor</p>
                </div>
                <div class="p-2 bg-red-100 rounded-full">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-end">
                    <span id="temperature-value" class="text-4xl font-bold text-gray-800">--</span>
                    <span class="text-xl text-gray-600 ml-1">°C</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span id="temperature-status" class="text-sm font-medium text-green-500">Normal</span>
                    <span id="temperature-time" class="text-xs text-gray-500">Last update: --:--</span>
                </div>
            </div>
        </div>

        <!-- pH Card -->
        <div class="bg-white rounded-lg shadow-md p-6 sensor-card border-t-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">pH Level</h2>
                    <p class="text-gray-500 text-sm">pH Sensor</p>
                </div>
                <div class="p-2 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-end">
                    <span id="ph-value" class="text-4xl font-bold text-gray-800">--</span>
                    <span class="text-xl text-gray-600 ml-1">pH</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span id="ph-status" class="text-sm font-medium text-green-500">Normal</span>
                    <span id="ph-time" class="text-xs text-gray-500">Last update: --:--</span>
                </div>
            </div>
        </div>

        <!-- TDS Card -->
        <div class="bg-white rounded-lg shadow-md p-6 sensor-card border-t-4 border-purple-500">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">TDS</h2>
                    <p class="text-gray-500 text-sm">Total Dissolved Solids</p>
                </div>
                <div class="p-2 bg-purple-100 rounded-full">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-end">
                    <span id="tds-value" class="text-4xl font-bold text-gray-800">--</span>
                    <span class="text-xl text-gray-600 ml-1">ppm</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span id="tds-status" class="text-sm font-medium text-green-500">Normal</span>
                    <span id="tds-time" class="text-xs text-gray-500">Last update: --:--</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Temperature Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Temperature History</h2>
            <div style="height: 300px; position: relative;">
                <canvas id="temperatureChart"></canvas>
            </div>
        </div>

        <!-- pH & TDS Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">pH & TDS History</h2>
            <div style="height: 300px; position: relative;">
                <canvas id="pHTDSChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Data Section -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Recent Readings</h2>
            <button id="refresh-data" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-150 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Refresh
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Timestamp</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Temperature (°C)</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">pH Level</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">TDS (ppm)</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody id="readings-table-body">
                    <tr>
                        <td colspan="5" class="py-4 px-6 text-center text-gray-500">Loading data...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function formatTime(dateString) {
            const date = new Date(dateString);
            return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }
        function updateStatus(value) {
            if (value > 30) return { text: 'High', class: 'text-red-500' };
            if (value < 20) return { text: 'Low', class: 'text-blue-500' };
            return { text: 'Normal', class: 'text-green-500' };
        }
        function fetchTemperature() {
            fetch('/temperature')
                .then(res => res.json())
                .then(data => {
                    if (data.length > 0) {
                        const latest = data[0];
                        document.getElementById('temperature-value').textContent = latest.temperature.toFixed(1);
                        document.getElementById('temperature-time').textContent = 'Last update: ' + formatTime(latest.recorded_at);
                        const status = updateStatus(latest.temperature);
                        const statusElement = document.getElementById('temperature-status');
                        statusElement.textContent = status.text;
                        statusElement.className = `text-sm font-medium ${status.class}`;
                    }
                })
                .catch(() => {
                    document.getElementById('temperature-value').textContent = '--';
                    document.getElementById('temperature-time').textContent = 'Last update: --:--';
                });
        }
        fetchTemperature();
        setInterval(fetchTemperature, 30000); // refresh tiap 30 detik
    });
</script>
@endsection 