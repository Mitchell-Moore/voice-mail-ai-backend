<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwilioVoiceController;


Route::post('/twilio/webhook', [TwilioVoiceController::class, 'handle']);
Route::post('/twilio/process-speech', [TwilioVoiceController::class, 'processSpeech']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
