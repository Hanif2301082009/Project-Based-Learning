<?php
namespace App\Http\Controllers;

use App\Models\Temperature;
use App\Models\Ph;
use App\Models\Tds;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    public function history()
    {
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $temperature = Temperature::orderBy('timestamp', 'desc')->skip($i)->first();
            $ph = Ph::orderBy('timestamp', 'desc')->skip($i)->first();
            $tds = Tds::orderBy('timestamp', 'desc')->skip($i)->first();

            if ($temperature && $ph && $tds) {
                $data[] = [
                    'timestamp' => $temperature->timestamp,
                    'temperature' => $temperature->temperature,
                    'ph' => $ph->ph,
                    'tds' => $tds->tds,
                    'status' => $temperature->temperature < 15 ? 'Low' : 'Normal',
                ];
            }
        }

        return response()->json($data);
    }
}