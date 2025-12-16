<?php

namespace MrShaneBarron\Lightbox\View\Components;

use Illuminate\View\Component;

class Lightbox extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('sb-lightbox::components.lightbox');
    }
}
