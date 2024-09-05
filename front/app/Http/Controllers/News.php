<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class News extends Controller
{
    public $news = [];
    public $page = 1;
    public $number = 5;

    public function Entertainment()
    {
        //validar si el usuario esta logueado en session
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-entertaiment/entertaiment/'.$this->page.'/'. $this->number);

        $this->news = $response->json()['articles'];

        return view('categories.entertainment');
    }

    public function Business()
    {
        if (!session()->has('api_token')) {
            return view('errors.403');
        }
        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-business/business/'.$this->page.'/'. $this->number);

        $this->news = $response->json()['articles'];

        return view('categories.business');
    }

    public function Health()
    {
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-health/health/'.$this->page.'/'. $this->number);

        $this->news = $response->json()['articles'];

        return view('categories.health');
    }

    public function Science()
    {
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-science/science/'.$this->page.'/'. $this->number);

        $this->news = $response->json()['articles'];

        return view('categories.science');
    }

    public function Sports()
    {
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-sports/sports/'.$this->page.'/'. $this->number);

        return view('categories.sports');
    }

    public function Technology()
    {
        if (!session()->has('api_token')) {
            return view('errors.403');
        }

        $apiUrl = env('API');
        $token = session('api_token');
        $response = Http::withHeaders([
            'Authorization' => $token ? 'Bearer ' . $token : '',
        ])->get($apiUrl . '/news-technology/technology/'.$this->page.'/'. $this->number);

        return view('categories.technology');
    }
}
