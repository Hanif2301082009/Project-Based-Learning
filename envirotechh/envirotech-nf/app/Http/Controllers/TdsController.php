<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tds;
use Illuminate\Support\Facades\Log;

class TdsController extends Controller
{
    public function index()
    {
        Log::info('GET /api/tds accessed');

        $tds = Tds::orderBy('timestamp', 'desc')->first(); // ✅ satu item

        return [
            'tds' => $tds->tds,
            'timestamp' => $tds->timestamp,
        ];

    }
    public function chartData()
    {
        $tdsData = Tds::orderBy('timestamp', 'desc')->limit(10)->get();

        return response()->json($tdsData);
    }
    public function history()
    {
        return \App\Models\Tds::orderBy('timestamp', 'desc')->take(10)->get();
    }


}
