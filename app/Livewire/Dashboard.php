<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;

class Dashboard extends Component
{
    public $names,$datas,$data;

    public function mount($name)
    {
        $this->names = $name;
        $this->datas =  Section::where("name",$this->names)->first();
    }

    public function getData()
    {
        return $this->data = 0; // Mengembalikan data
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
