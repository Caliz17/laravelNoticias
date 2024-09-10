<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        try {
            $api_key = env('NEWS_API_KEY');
            $response = Http::get('https://newsapi.org/v2/top-headlines', [
                'category' => 'general',
                'country' => 'us',
                'apiKey' => $api_key,
                'pageSize' => 15,
                'page' => 1,
                'language' => 'en'
            ]);

            if ($response->successful()) {
                $articles = $response->json('articles');
                $filteredArticles = array_filter($articles, function ($article) {
                    return !is_null($article['urlToImage']);
                });
                $limitedArticles = array_slice($filteredArticles, 0, 5);

                return response()->json([
                    'success' => true,
                    'data' => $limitedArticles
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener noticias de la API',
                    'error' => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function showGeneral()
    {
        $api_key = env('NEWS_API_KEY');

        try {
            $response = Http::get('https://newsapi.org/v2/top-headlines', [
                'category' => 'general',
                'country' => 'us',
                'apiKey' => $api_key,
                'pageSize' => 100,
                'language' => 'en',
                'page' => 1
            ]);

            if ($response->successful()) {
                $articles = $response->json('articles');
                $filteredArticles = array_filter($articles, function ($article) {
                    return !is_null($article['urlToImage']);
                });

                return response()->json([
                    'success' => true,
                    'data' => $filteredArticles
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Error fetching news',
                    'status' => $response->status()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'An error occurred while fetching news',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function newsWithCategories($category)
    {
        $api_key = env('NEWS_API_KEY');

        try {
            $response = Http::get('https://newsapi.org/v2/top-headlines', [
                'category' => $category,
                'apiKey' => $api_key,
                'language' => 'en',
                'pageSize' => 100,
                'page' => 1
            ]);

            if ($response->successful()) {
                $articles = $response->json('articles');
                $filteredArticles = array_filter($articles, function ($article) {
                    return !is_null($article['urlToImage']);
                });

                return response()->json([
                    'success' => true,
                    'data' => $filteredArticles
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Error fetching news',
                    'status' => $response->status()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'An error occurred while fetching news',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function suggestionsWithTitle(Request $request)
    {
        $api_key = env('NEWS_API_KEY');
        $title = $request->title;

        try {
            $response = Http::get('https://newsapi.org/v2/everything', [
                'q' => $title,
                'apiKey' => $api_key,
                'pageSize' => 10,
                'language' => 'en',
                'page' => 1
            ]);

            if ($response->successful()) {
                $articles = $response->json('articles');
                $filteredArticles = array_filter($articles, function ($article) {
                    return !is_null($article['urlToImage']);
                });

                $limitedArticles = array_slice($filteredArticles, 0, 3);
                return response()->json([
                    'success' => true,
                    'data' => $limitedArticles
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Error fetching news',
                    'status' => $response->status()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'An error occurred while fetching news',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
