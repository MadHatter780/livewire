<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public $titles,$topic;

    public function __construct($titles,$topic)
    {
        $this->titles = $titles;
        $this->topic = $topic;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard');
    }
}
