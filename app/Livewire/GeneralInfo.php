<?php

namespace App\Livewire;

use App\Models\Information;
use Livewire\Component;

class GeneralInfo extends Component
{
    public function render()
    {
        $generalInfo = Information::where('type', 'general_info')->value('content');
        return view('livewire.general-info', compact('generalInfo'));
    }
}
