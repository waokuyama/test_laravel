<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;



class Test extends Component
{
    public $title;
    /**
     * Create a new component instance.
     * 
     * @return void
     * 
     */
    public function __construct($title)
    {
        $this->title = $title;
        // $this->menus = $menus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.test');
    }
}
