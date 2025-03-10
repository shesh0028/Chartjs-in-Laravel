<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

Route::get('/', [ChartController::class, 'openChartPage']);
