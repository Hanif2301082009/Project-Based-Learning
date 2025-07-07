<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ph;
use Illuminate\Support\Facades\Log;

class PhController extends Controller
{
    public function index()
    {
        Log::info('GET /api/ph accessed');

        $ph = Ph::orderBy('timestamp', 'desc')->first(); // ✅ satu item

        return [
            'ph' => $ph->ph,
            'timestamp' => $ph->timestamp,
        ];

    }
    public function chartData()
    {
        $phData = Ph::orderBy('timestamp', 'desc')->limit(10)->get();

        return response()->json($phData);
    }
    public function history()
    {
        return \App\Models\Ph::orderBy('timestamp', 'desc')->take(10)->get();
    }


}
