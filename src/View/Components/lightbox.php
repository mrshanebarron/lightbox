<?php

namespace MrShaneBarron\lightbox\View\Components;

use Illuminate\View\Component;

class lightbox extends Component
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
