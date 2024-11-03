<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class kotak extends Component
{
    /**
     * Create a new component instance.
     */
    public $datas,$satuan,$title,$warna,$logo;

    public function __construct($title,$warna,$satuan,$datas,$logo)
    {
        $this->title = $title;
        $this->warna = $warna;
        $this->datas = $datas;
        $this->satuan = $satuan;
        $this->logo = $logo;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kotak');
    }
}
