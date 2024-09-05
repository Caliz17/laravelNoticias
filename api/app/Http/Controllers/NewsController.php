<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $api_key = env('GNews_API_KEY');
        $response = Http::get('https://gnews.io/api/v4/top-headlines', [
            'token' => $api_key,
            'lang' => 'en',
            'country' => 'us',
            'max'=> 5
        ]);
    }
}
