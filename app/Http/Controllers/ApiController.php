<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
    * esta funcion hace el consumo de la Api de youtube y por medio de un buscador devuelve una respuesta
    * [searchVideos description]
    *
    * @param   Request  $request  [$request description]
    *
    * @return  [type]             [return description]
    */
    public function searchVideos(Request $request)
    {
        $apiKey = ('your api');
        $query = $request->input('query');
        $maxResults = 1;
        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'key' => $apiKey,
            'q' => $query,
            'part' => 'id,snippet',
            'order' => 'relevance',
            'maxResults' => $maxResults
        ]);
    
        if ($response->successful()) {
            $items = $response->json()['items'];
            $videoIds = array_map(function ($item) {
                return $item['id']['videoId'];
            }, $items);
            $detailsResponse = Http::get('https://www.googleapis.com/youtube/v3/videos', [
                'key' => $apiKey,
                'id' => implode(',', $videoIds),
                'part' => 'snippet,statistics'
            ]);
            if ($detailsResponse->successful()) {
                return response()->json($detailsResponse->json()['items']);
            } 
        } 
    }
    
    /**
     * Esta funcion retorna los videos por defecto que no son buscados
     * [index description]
     *
     * @return  [type]  [return description]
     */
    public function index()
    {
        $apiKey = 'your api'; 
        $maxResults = 7; 
        
        $response = Http::get('https://www.googleapis.com/youtube/v3/videos', [
            'key' => $apiKey,
            'chart' => 'mostPopular', 
            'part' => 'snippet,statistics',
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
