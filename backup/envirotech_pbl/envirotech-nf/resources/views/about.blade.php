@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">About EnviroTech</h1>
        <p class="text-gray-600">Learn about our IoT environmental monitoring system</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Image and Quick Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <img src="{{ asset('images/envirotech-system.jpg') }}" alt="EnviroTech System" class="w-full h-auto object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">EnviroTech Monitoring</h2>
                    <p class="text-gray-600 mb-4">Advanced IoT-based environmental monitoring solution</p>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Real-time monitoring</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Multiple sensor support</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Firebase integration</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Docker containerization</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Contact Us</h2>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-700">info@envirotech.com</span>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-gray-700">+62 123 456 7890</span>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-gray-700">Jakarta, Indonesia</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Our Project</h2>
                <p class="text-gray-700 mb-4">
                    EnviroTech is an advanced IoT-based environmental monitoring system designed to provide real-time data on key environmental parameters. Our system leverages ESP8266 microcontrollers with multiple sensors to track temperature, pH levels, and Total Dissolved Solids (TDS) in various applications.
                </p>
                <p class="text-gray-700 mb-4">
                    Whether you're monitoring water quality, agricultural conditions, or industrial processes, EnviroTech provides accurate, reliable data when you need it. Our system is built with modern technologies for reliability and performance.
                </p>
                <p class="text-gray-700">
                    The monitoring dashboard gives you a comprehensive view of all your sensor data in real-time, with historical data tracking and alert notifications when readings fall outside your specified thresholds.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Technical Features</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Microcontroller -->
                    <div class="border rounded-lg p-4 hover:shadow-md transition duration-200">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-blue-100 rounded-full mr-3">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-800">ESP8266 Microcontroller</h3>
                        </div>
                        <p class="text-gray-600">
                            Wi-Fi enabled microcontroller with powerful processing capabilities for sensor integration and data transmission.
                        </p>
                    </div>
                    
                    <!-- Temperature Sensor -->
                    <div class="border rounded-lg p-4 hover:shadow-md transition duration-200">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-red-100 rounded-full mr-3">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-800">DS18B20 Temperature Sensor</h3>
                        </div>
                        <p class="text-gray-600">
                            Digital temperature sensor with ±0.5°C accuracy and waterproof options for various environmental conditions.
                        </p>
                    </div>
                    
                    <!-- pH Sensor -->
                    <div class="border rounded-lg p-4 hover:shadow-md transition duration-200">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-blue-100 rounded-full mr-3">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-800">pH Sensor</h3>
                        </div>
                        <p class="text-gray-600">
                            Measures the acidity or alkalinity of liquids with high precision, essential for water quality monitoring.
                        </p>
                    </div>
                    
                    <!-- TDS Sensor -->
                    <div class="border rounded-lg p-4 hover:shadow-md transition duration-200">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-purple-100 rounded-full mr-3">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-800">TDS Sensor</h3>
                        </div>
                        <p class="text-gray-600">
                            Measures Total Dissolved Solids in water, indicating water purity and mineral content levels.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">System Architecture</h2>
                <div class="mb-4">
                    <img src="{{ asset('images/system-architecture.jpg') }}" alt="System Architecture" class="w-full h-auto rounded-lg shadow">
                </div>
                <p class="text-gray-700 mb-4">
                    Our EnviroTech system utilizes a modern microservice architecture where each sensor operates as an independent unit in its own Docker container. This approach provides several advantages:
                </p>
                <ul class="list-disc pl-5 text-gray-700 space-y-2 mb-4">
                    <li>Improved reliability - Issues with one sensor don't affect the others</li>
                    <li>Easier maintenance - Each container can be updated independently</li>
                    <li>Better scalability - New sensors can be added without disrupting the existing system</li>
                    <li>Resource optimization - Computing resources are allocated efficiently</li>
                </ul>
                <p class="text-gray-700">
                    Data from all sensor containers flows into Firebase Realtime Database, allowing for instantaneous updates to the monitoring dashboard. The web interface then visualizes this data and provides tools for analysis and configuration.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection 