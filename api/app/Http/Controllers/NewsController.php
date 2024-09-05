<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $api_key = env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => 'general',
                'country' => 'us',
                'apiKey' => $api_key,
                'pageSize' => 5,
                'page' => 1,
                'language' => 'en'
        ]);
        return response()->json($response->json());
    }

    public function showGeneral($page, $number)
    {
        $api_key = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => 'general',
            'country' => 'us',
            'apiKey' => $api_key,
            'pageSize' => $number,
            'language' => 'en',
            'page' => $page
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json([
                'error' => 'Error fetching news',
                'status' => $response->status()
            ], $response->status());
        }
    }




}
