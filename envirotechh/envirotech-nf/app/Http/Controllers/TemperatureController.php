<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;
use Illuminate\Support\Facades\Log;

class TemperatureController extends Controller
{
    public function index()
    {
        Log::info('GET /api/temperature accessed');

        $temperature = Temperature::orderBy('timestamp', 'desc')->first(); // ✅ satu item

        return [
            'temperature' => $temperature->suhu,
            'timestamp' => $temperature->timestamp,
        ];

    }

}
