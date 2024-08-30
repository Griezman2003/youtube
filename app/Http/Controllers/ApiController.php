<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function searchVideos(Request $request)
    {
        $apiKey = ('AIzaSyBFAeN-1s7AVVPaPPL8VFiJoFBHX_Rych8');
        $query = $request->input('query');
        $maxResults = 1;

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'key' => $apiKey,
            'q' => $query,
            'part' => 'snippet',
            'order' => 'relevance',
            'maxResults' => $maxResults
        ]);

        if ($response->successful()) {
            return response()->json($response->json()['items']);
        } else {
            return response()->json(['error' => 'Error al obtener videos'], $response->status());
        }
    }
}
