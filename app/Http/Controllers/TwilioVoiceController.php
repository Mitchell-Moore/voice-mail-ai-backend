<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\TwiML\VoiceResponse;

class TwilioVoiceController extends Controller
{
    public function handle(Request $request)
    {
        $response = new VoiceResponse();

        // Greet and gather input
        $gather = $response->gather([
            'input' => 'speech',
            'action' => url('/api/twilio/process-speech'),
            'method' => 'POST',
        ]);
        $gather->say("Hi! How can I help you today?");

        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    public function processSpeech(Request $request)
    {
        $userSpeech = $request->input('SpeechResult');
        
        // Send to AI Agent (e.g., GPT)
        $reply = $this->sendToAI($userSpeech);

        $response = new VoiceResponse();
        $response->say($reply);

        return response($response, 200)->header('Content-Type', 'text/xml');
    }

    private function sendToAI(string $input): string
    {
        // Call OpenAI or any AI service here
        // Placeholder:
        return "You said: " . $input . ". This is a test response.";
    }
}
