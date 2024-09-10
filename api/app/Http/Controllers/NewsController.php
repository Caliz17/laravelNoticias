<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $api_key = env('NEWSDATA_API_KEY');
        $cacheKey = 'news_data';
        $cacheTime = 30 * 60;

        try {
            $news = cache()->remember($cacheKey, $cacheTime, function () use ($api_key) {
                $response = Http::get('https://newsdata.io/api/1/news', [
                    'category' => 'top',
                    'country' => 'us',
                    'apikey' => $api_key,
                    'language' => 'es',
                ]);

                if ($response->successful()) {
                    $newsData = $response->json();
                    $filteredNews = array_filter($newsData['results'], function ($item) {
                        return !empty($item['image_url']) &&
                               !empty($item['description']) &&
                               !empty($item['creator']) &&
                               is_array($item['creator']) &&
                               !empty($item['creator'][0]);
                    });
                    return array_slice($filteredNews, 0, 5);
                } else {
                    throw new \Exception('Error en la solicitud de noticias: ' . $response->body());
                }
            });

            return response()->json([
                'news' => $news
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Se produjo un error al procesar la solicitud.',
                'message' => $e->getMessage()
            ], 500);
        }
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
