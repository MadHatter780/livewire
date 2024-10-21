<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardDashboard extends Component
{
    /**
     * Create a new component instance.
     */

    public $name,$satuan,$id;

    public function __construct($name,$satuan,$id)
    {
        $this->name = $name;
        $this->id = $id;
        $this->satuan =$satuan;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-dashboard');
    }
}
