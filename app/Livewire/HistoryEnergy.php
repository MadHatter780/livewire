<?php

namespace App\Livewire;

use App\Models\Energy;
use Livewire\Component;
use Illuminate\Support\Carbon;

class HistoryEnergy extends Component
{

    public $dataBySection = "";  // Nilai section yang dipilih
    public $timeFilter = "";  // Nilai section yang dipilih
    public $energy = 0;
    public $cost = 0;
    public $carbon = 0;
    public function render()
    {
        $query = Energy::query();

        if (!empty($this->dataBySection) && !empty($this->timeFilter)) {

            if (!empty($this->dataBySection) && !empty($this->timeFilter)) {
                if ($this->timeFilter == "week") {
                    $query->where('label', $this->dataBySection)
                          ->whereBetween('created_at', [
                              Carbon::now()->startOfWeek(),
                              Carbon::now()->endOfWeek()
                          ]);
                    $eW = $query->orderBy("created_at","desc")->first();
                    if($eW){
                        $this->energy = $eW->accenergy;
                        $this->cost = $eW->accenergy * 5;
                        $this->carbon = $eW->accenergy * 0.495;
                    }else{
                        $this->energy = 0;
                        $this->cost = 0 ;
                        $this->carbon = 0 ;
                    }


                }
                else if ($this->timeFilter == "month") {
                    $query->where('label', $this->dataBySection)
                          ->whereBetween('created_at', [
                              Carbon::now()->startOfMonth(),
                              Carbon::now()->endOfMonth()
                          ]);
                    $eW = $query->orderBy("created_at","desc")->first();
                    $this->energy = $eW->accenergy ;
                    $this->cost = $eW->accenergy ;
                    $this->carbon = $eW->accenergy ;

                }
                else if ($this->timeFilter == "year") {
                    $query->where('label', $this->dataBySection)
                          ->whereBetween('created_at', [
                              Carbon::now()->startOfYear(),
                              Carbon::now()->endOfYear()
                          ]);
                    $eW = $query->orderBy("created_at","desc")->first();
                    $this->energy = $eW->accenergy;
                    $this->cost = $eW->accenergy * 5;
                    $this->carbon = $eW->accenergy * 0.495;

                }
            }



        }



        return view('livewire.history-energy');
    }
}
