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

    public function newsWithCategories($category, $page, $number)
    {
        $api_key = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => $category,
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

    public function newsEntertainment($page, $number)
    {
        $api_key = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => 'entertainment',
            'country' => 'us',
            'apiKey' => $api_key,
            'language' => 'en',
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

    public function newsBusiness($page, $number)
    {
        $api_key = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => 'business',
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

    public function newsHealth($page, $number)
    {
        $api_key = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => 'health',
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

    public function newsScience($page, $number)
    {
        $api_key = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => 'science',
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

    public function newsSports($page, $number)
    {
        $api_key = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'category' => 'sports',
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
