<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class News extends Controller
{
    public $news = [];
    public $page = 1;
    public $number = 5;
    public $category = '';

    public function Entertainment()
    {
        Carbon::setLocale('es');
        if (!session()->has('api_token')) {
            return view('errors.403');
        }
        $category = 'entertainment';

        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-category/'.$category);
        $this->news = $response['data'];

        return view('categories.entertainment', ['news' => $this->news]);
    }

    public function Business()
    {
        Carbon::setLocale('es');
        if (!session()->has('api_token')) {
            return view('errors.403');
        }
        $category = 'business';
        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-category/'.$category);

        $this->news = $response['data'];

        return view('categories.business', ['news' => $this->news]);
    }

    public function Health()
    {
        Carbon::setLocale('es');
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $category = 'health';
        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-category/'.$category);

        $this->news = $response['data'];

        return view('categories.health', ['news' => $this->news]);
    }

    public function Science()
    {
        Carbon::setLocale('es');
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $category = 'science';
        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-category/'.$category);

        $this->news = $response['data'];

        return view('categories.science', ['news' => $this->news]);
    }

    public function Sports()
    {
        Carbon::setLocale('es');
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $category = 'sports';
        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-category/'.$category);

        $this->news = $response['data'];

        return view('categories.sports', ['news' => $this->news]);
    }

    public function Technology()
    {
        Carbon::setLocale('es');
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $category = 'technology';
        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-category/'.$category);

        $this->news = $response['data'];
        return view('categories.technology', ['news' => $this->news]);
    }

    public function detail(Request $request)
    {
        $data = json_decode($request->input('newsData'));
        $title = $data->title;

        $words = explode(' ', $title);

        $firstWord = $words[0];

        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-suggestions/', 'title='.$firstWord);
        $suggestions = $response['data'];

        Carbon::setLocale('es');
        $newsData = json_decode($request->input('newsData'), true);

        return view('detail', [
            'news' => $newsData,
            'suggestions' => $suggestions
        ]);
    }


}
