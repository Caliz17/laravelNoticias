<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $image;
    public $title;
    public $description;

    public function __construct($image, $title, $description)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.card');
    }
}
