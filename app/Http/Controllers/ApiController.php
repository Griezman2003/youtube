<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
    * esta funcion hace el consumo de la Api de youtube
    * [searchVideos description]
    *
    * @param   Request  $request  [$request description]
    *
    * @return  [type]             [return description]
    */
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
    
    public function index()
    {
        $apiKey = 'AIzaSyBFAeN-1s7AVVPaPPL8VFiJoFBHX_Rych8'; 
        $maxResults = 5; 
        
        $response = Http::get('https://www.googleapis.com/youtube/v3/videos', [
            'key' => $apiKey,
            'chart' => 'mostPopular', 
            'part' => 'snippet',
            'maxResults' => $maxResults,
            'regionCode' => 'MX'
        ]);
        
        if ($response->successful()) {
            return response()->json($response->json()['items']);
        } else {
            return response()->json(['error' => 'Error al obtener videos'], $response->status());
        }
    }
}
