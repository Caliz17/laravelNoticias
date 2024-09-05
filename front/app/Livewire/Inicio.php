<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Inicio extends Component
{
    public $isLoggedIn = false;
    public $user;

    public function mount()
    {
        $apiUrl = env('API');

        $response = Http::get($apiUrl . '/user-profile');

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['success']) && $data['success']) {
                $this->isLoggedIn = true;
                $this->user = $data['data'] ?? null;
            } else {
                $this->isLoggedIn = false;
                $this->user = null;
            }
        } else {
            $this->isLoggedIn = false;
            $this->user = null;
        }
    }

    public function render()
    {
        return view('login_acceder.buttons', [
            'isLoggedIn' => $this->isLoggedIn,
            'user' => $this->user
        ]);
    }
}
