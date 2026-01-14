<?php

use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

// Region
Route::prefix('regions')->middleware('throttle:api')->group(function () {
    Route::get('/', [RegionController::class, 'index']);
    Route::post('/', [RegionController::class, 'store']);
    Route::patch('/{id}', [RegionController::class, 'update']);
    Route::delete('/{id}', [RegionController::class, 'destroy']);
});


Route::fallback(function () {
    return response()->json(['success' => 'false', 'message' => 'Endpoint Not Found, Please recheck the url ...'], 404);
});
