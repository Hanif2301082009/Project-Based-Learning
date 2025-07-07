<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;

class TemperatureController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'device_id' => 'required|string',
            'temperature' => 'required|numeric',
            'recorded_at' => 'nullable|date',
        ]);

        Temperature::create($data);
        return response()->json(['message' => 'Temperature saved.'], 201);
    }

    public function index()
    {
        return Temperature::latest()->take(100)->get();
    }
}

