<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function openChartPage()
    {
        $usersByNameInitial = \App\Models\User::selectRaw("UPPER(LEFT(name, 1)) as initial, COUNT(*) as total")
        ->groupBy('initial')
        ->orderBy('initial')
        ->pluck('total', 'initial');

        return view('charts', [
            'labels' => $usersByNameInitial->keys(),
            'data' => $usersByNameInitial->values(),
        ]);
    }
}



















