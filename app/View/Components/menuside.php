<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class menuside extends Component
{
    /**
     * Create a new component instance.
     */

    public $logo,$route;
    public function __construct($logo,$route)
    {
        $this->logo = $logo;
        $this->route = $route;

        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menuside');
    }
}
