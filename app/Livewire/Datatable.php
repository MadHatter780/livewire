<?php

namespace App\Livewire;

use App\Models\Energy;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $section = "";  // Nilai section yang dipilih
    public $dateStart = "";  // Untuk filter tanggal jika diperlukan
    public $dateEnd = "";    // Untuk filter tanggal jika diperlukan
    public $selectedValue = "";  // Untuk menyimpan nilai section yang dipilih
    public $dataBySection = "";  // Properti untuk menyimpan data section yang dipilih
    protected $paginationTheme = 'tailwind';  // Untuk menggunakan Tailwind pada pagination
    public $pagination = 20;  // Jumlah data per halaman

    public function updatingDataBySection($value)
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Energy::query();

        if (!empty($this->dataBySection)) {
            $query->where('label', $this->dataBySection)->latest();
        }
        else{
            $data = $query->paginate($this->pagination);
        }

        $data = $query->orderBy("id","desc")->paginate($this->pagination);
        return view('livewire.datatable', ['data' => $data]);
    }
}
