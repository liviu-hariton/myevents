<?php

use App\Http\Controllers\Api\AttendeeControler;
use App\Http\Controllers\Api\EventControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('events', EventControler::class);
Route::apiResource('events.attendees', AttendeeControler::class)
    ->scoped(['attendee' => 'event']);
