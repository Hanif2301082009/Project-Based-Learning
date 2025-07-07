@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <!-- Header Section with Glassmorphism -->
    <div class="backdrop-blur-sm bg-white/30 border-b border-white/20 sticky top-0 z-50">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        IoT Monitoring Hub
                    </h1>
                    <p class="text-slate-600 mt-2 flex items-center">
                        <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                        Real-time sensor data from your ESP32 deployment
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="px-4 py-2 bg-white/50 backdrop-blur-sm rounded-full border border-white/30">
                        <span class="text-sm text-slate-600">Last sync: </span>
                        <span id="last-sync" class="font-semibold text-slate-800">--:--</span>
                    </div>
                    <button id="refresh-all" class="group bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Refresh All
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- Overview Section with Enhanced Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Temperature Card -->
            <div class="group sensor-card bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-red-500/5 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-slate-800 mb-1">Temperature</h2>
                            <p class="text-slate-500 text-sm flex items-center">
                                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                                DS18B20 Sensor
                            </p>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-red-400 to-orange-500 rounded-xl shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-end mb-3">
                            <span id="temperature-value" class="text-5xl font-bold text-slate-800 transition-all duration-300">--</span>
                            <span class="text-2xl text-slate-600 ml-2 mb-1">°C</span>
                        </div>
                        <div class="h-2 bg-slate-200 rounded-full overflow-hidden">
                            <div id="temperature-bar" class="h-full bg-gradient-to-r from-red-400 to-orange-500 rounded-full transition-all duration-1000 w-0"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span id="temperature-status" class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">Normal</span>
                        <span id="temperature-time" class="text-xs text-slate-500">Last update: --:--</span>
                    </div>
                </div>
            </div>

            <!-- pH Card -->
            <div class="group sensor-card bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-slate-800 mb-1">pH Level</h2>
                            <p class="text-slate-500 text-sm flex items-center">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                pH Sensor
                            </p>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-end mb-3">
                            <span id="ph-value" class="text-5xl font-bold text-slate-800 transition-all duration-300">--</span>
                            <span class="text-2xl text-slate-600 ml-2 mb-1">pH</span>
                        </div>
                        <div class="h-2 bg-slate-200 rounded-full overflow-hidden">
                            <div id="ph-bar" class="h-full bg-gradient-to-r from-blue-400 to-cyan-500 rounded-full transition-all duration-1000 w-0"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span id="ph-status" class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">Normal</span>
                        <span id="ph-time" class="text-xs text-slate-500">Last update: --:--</span>
                    </div>
                </div>
            </div>

            <!-- TDS Card -->
            <div class="group sensor-card bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-slate-800 mb-1">TDS</h2>
                            <p class="text-slate-500 text-sm flex items-center">
                                <span class="w-2 h-2 bg-purple-400 rounded-full mr-2"></span>
                                Total Dissolved Solids
                            </p>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                            </svg>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-end mb-3">
                            <span id="tds-value" class="text-5xl font-bold text-slate-800 transition-all duration-300">--</span>
                            <span class="text-2xl text-slate-600 ml-2 mb-1">ppm</span>
                        </div>
                        <div class="h-2 bg-slate-200 rounded-full overflow-hidden">
                            <div id="tds-bar" class="h-full bg-gradient-to-r from-purple-400 to-pink-500 rounded-full transition-all duration-1000 w-0"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span id="tds-status" class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">Normal</span>
                        <span id="tds-time" class="text-xs text-slate-500">Last update: --:--</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section with Enhanced Styling -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 hover:shadow-2xl transition-all duration-500">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-800">Temperature Trends</h2>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-gradient-to-r from-red-400 to-orange-500 rounded-full"></div>
                        <span class="text-sm text-slate-600">Last 24h</span>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-slate-50 to-white rounded-xl p-4" style="height: 320px;">
                    <canvas id="temperatureChart"></canvas>
                </div>
            </div>
            
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 hover:shadow-2xl transition-all duration-500">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-800">pH & TDS Analysis</h2>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-full"></div>
                            <span class="text-sm text-slate-600">pH</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full"></div>
                            <span class="text-sm text-slate-600">TDS</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-slate-50 to-white rounded-xl p-4" style="height: 320px;">
                    <canvas id="pHTDSChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Enhanced Table Section -->
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden">
            <div class="p-8 border-b border-slate-200">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800 mb-2">Recent Readings</h2>
                        <p class="text-slate-600 text-sm">Latest sensor data entries</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex items-center space-x-4">
                        <select id="data-filter" class="bg-white/50 backdrop-blur-sm border border-white/30 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="all">All Data</option>
                            <option value="hour">Last Hour</option>
                            <option value="day">Last 24h</option>
                            <option value="week">Last Week</option>
                        </select>
                        <button id="export-data" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-2 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Export CSV
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-slate-100 to-slate-200">
                        <tr>
                            <th class="py-4 px-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Timestamp</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Temperature (°C)</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">pH Level</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">TDS (ppm)</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody id="readings-table-body" class="divide-y divide-slate-200">
                        <tr class="animate-pulse">
                            <td colspan="5" class="py-8 px-6 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <div class="w-4 h-4 bg-blue-400 rounded-full animate-bounce"></div>
                                    <div class="w-4 h-4 bg-purple-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                    <div class="w-4 h-4 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                    <span class="ml-3 text-slate-500">Loading sensor data...</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Floating Connection Status -->
<div id="connection-status" class="fixed bottom-6 right-6 z-50">
    <div class="bg-white/90 backdrop-blur-sm rounded-full px-4 py-2 shadow-lg border border-white/30 flex items-center space-x-2">
        <div id="status-indicator" class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
        <span id="status-text" class="text-sm font-medium text-slate-700">Connected</span>
    </div>
</div>
@endsection

@section('scripts')
<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.sensor-card {
    animation: fadeInUp 0.6s ease-out;
}

.sensor-card:nth-child(1) { animation-delay: 0.1s; }
.sensor-card:nth-child(2) { animation-delay: 0.2s; }
.sensor-card:nth-child(3) { animation-delay: 0.3s; }

@keyframes shimmer {
    0% { background-position: -200px 0; }
    100% { background-position: calc(200px + 100%) 0; }
}

.loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200px 100%;
    animation: shimmer 1.5s infinite;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let connectionStatus = true;
    
    function formatTime(dateString) {
        const date = new Date(dateString);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    function updateLastSync() {
        const now = new Date();
        document.getElementById('last-sync').textContent = formatTime(now);
    }

    function updateConnectionStatus(connected) {
        const indicator = document.getElementById('status-indicator');
        const text = document.getElementById('status-text');
        
        if (connected) {
            indicator.className = 'w-3 h-3 bg-green-400 rounded-full animate-pulse';
            text.textContent = 'Connected';
            text.className = 'text-sm font-medium text-green-700';
        } else {
            indicator.className = 'w-3 h-3 bg-red-400 rounded-full animate-ping';
            text.textContent = 'Disconnected';
            text.className = 'text-sm font-medium text-red-700';
        }
    }

    function updateStatus(value, type = 'temperature') {
        let status, bgClass, textClass;
        
        if (type === 'tds') {
            if (value > 1000) {
                status = 'High';
                bgClass = 'bg-red-100';
                textClass = 'text-red-700';
            } else if (value < 300) {
                status = 'Low';
                bgClass = 'bg-blue-100';
                textClass = 'text-blue-700';
            } else {
                status = 'Normal';
                bgClass = 'bg-green-100';
                textClass = 'text-green-700';
            }
        } else if (type === 'ph') {
            if (value < 5.5) {
                status = 'Acidic';
                bgClass = 'bg-orange-100';
                textClass = 'text-orange-700';
            } else if (value > 8.0) {
                status = 'Alkaline';
                bgClass = 'bg-yellow-100';
                textClass = 'text-yellow-700';
            } else {
                status = 'Normal';
                bgClass = 'bg-green-100';
                textClass = 'text-green-700';
            }
        } else { // temperature
            if (value > 30) {
                status = 'High';
                bgClass = 'bg-red-100';
                textClass = 'text-red-700';
            } else if (value < 20) {
                status = 'Low';
                bgClass = 'bg-blue-100';
                textClass = 'text-blue-700';
            } else {
                status = 'Normal';
                bgClass = 'bg-green-100';
                textClass = 'text-green-700';
            }
        }
        
        return { status, className: `px-3 py-1 rounded-full text-sm font-semibold ${bgClass} ${textClass}` };
    }

    function updateProgressBar(value, type, element) {
        let percentage = 0;
        if (type === 'temperature') {
            percentage = Math.min(100, Math.max(0, (value / 50) * 100));
        } else if (type === 'ph') {
            percentage = Math.min(100, Math.max(0, (value / 14) * 100));
        } else if (type === 'tds') {
            percentage = Math.min(100, Math.max(0, (value / 2000) * 100));
        }
        
        setTimeout(() => {
            element.style.width = `${percentage}%`;
        }, 100);
    }

    function fetchTemperature() {
        fetch('/temperature')
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                const valueElement = document.getElementById('temperature-value');
                const timeElement = document.getElementById('temperature-time');
                const statusElement = document.getElementById('temperature-status');
                const barElement = document.getElementById('temperature-bar');
                
                // Animate value change
                valueElement.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    valueElement.textContent = data.temperature.toFixed(1);
                    valueElement.style.transform = 'scale(1)';
                }, 150);
                
                timeElement.textContent = 'Last update: ' + formatTime(data.timestamp);
                
                const statusInfo = updateStatus(data.temperature, 'temperature');
                statusElement.textContent = statusInfo.status;
                statusElement.className = statusInfo.className;
                
                updateProgressBar(data.temperature, 'temperature', barElement);
                updateConnectionStatus(true);
                updateLastSync();
            })
            .catch(error => {
                console.error('Temperature fetch error:', error);
                updateConnectionStatus(false);
            });
    }

    function fetchTds() {
        fetch('/tds')
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                const valueElement = document.getElementById('tds-value');
                const timeElement = document.getElementById('tds-time');
                const statusElement = document.getElementById('tds-status');
                const barElement = document.getElementById('tds-bar');
                
                // Animate value change
                valueElement.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    valueElement.textContent = data.tds.toFixed(1);
                    valueElement.style.transform = 'scale(1)';
                }, 150);
                
                timeElement.textContent = 'Last update: ' + formatTime(data.timestamp);
                
                const statusInfo = updateStatus(data.tds, 'tds');
                statusElement.textContent = statusInfo.status;
                statusElement.className = statusInfo.className;
                
                updateProgressBar(data.tds, 'tds', barElement);
                updateConnectionStatus(true);
            })
            .catch(error => {
                console.error('TDS fetch error:', error);
                updateConnectionStatus(false);
            });
    }

    function fetchPh() {
        fetch('/ph')
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                const valueElement = document.getElementById('ph-value');
                const timeElement = document.getElementById('ph-time');
                const statusElement = document.getElementById('ph-status');
                const barElement = document.getElementById('ph-bar');
                
                // Animate value change
                valueElement.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    valueElement.textContent = data.ph.toFixed(1);
                    valueElement.style.transform = 'scale(1)';
                }, 150);
                
                timeElement.textContent = 'Last update: ' + formatTime(data.timestamp);
                
                const statusInfo = updateStatus(data.ph, 'ph');
                statusElement.textContent = statusInfo.status;
                statusElement.className = statusInfo.className;
                
                updateProgressBar(data.ph, 'ph', barElement);
                updateConnectionStatus(true);
            })
            .catch(error => {
                console.error('pH fetch error:', error);
                updateConnectionStatus(false);
            });
    }

    function fetchAllData() {
        const refreshButton = document.getElementById('refresh-all');
        refreshButton.classList.add('animate-spin');
        
        Promise.all([
            fetchTemperature(),
            fetchTds(),
            fetchPh()
        ]).finally(() => {
            setTimeout(() => {
                refreshButton.classList.remove('animate-spin');
            }, 500);
        });
    }

    // Event listeners
    document.getElementById('refresh-all').addEventListener('click', fetchAllData);
    
    document.getElementById('export-data').addEventListener('click', function() {
        // Add export functionality here
        this.innerHTML = '<svg class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>Exporting...';
        
        setTimeout(() => {
            this.innerHTML = '<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Exported!';
            setTimeout(() => {
                this.innerHTML = '<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>Export CSV';
            }, 2000);
        }, 1500);
    });

    // Initial load
    fetchAllData();

    // Auto-refresh every 5 seconds
    setInterval(() => {
        fetchTemperature();
        fetchTds();
        fetchPh();
    }, 5000);
});
</script>
@endsection