<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatGPTController extends Controller
{
    public function chat(Request $request)
    {
        $userMessage = $request->input('message');

        if (!$userMessage) {
            return response()->json(['error' => 'Message cannot be empty'], 400);
        }

        $apiKey = env('OPENAI_API_KEY');

        if (!$apiKey) {
            return response()->json(['error' => 'Missing OpenAI API key'], 500);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful AI assistant.'],
                    ['role' => 'user', 'content' => $userMessage],
                ],
                'temperature' => 0.7,
                'max_tokens' => 150,
            ]);

            $responseData = $response->json();

            if ($response->failed()) {
                Log::error('OpenAI API Error: ' . json_encode($responseData));
                return response()->json(['error' => 'API request failed'], 500);
            }

            return response()->json($responseData);

        } catch (\Exception $e) {
            Log::error('ChatGPT API Exception: ' . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
    }
}
