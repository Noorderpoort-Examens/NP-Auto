<?php

namespace App\Livewire;

use App\Models\OpeningTime;
use Livewire\Component;

class OpeningTimes extends Component
{
    public function render()
    {
        $openingTime = OpeningTime::all();
        return view('livewire.opening-times', compact('openingTime'));
    }
}
