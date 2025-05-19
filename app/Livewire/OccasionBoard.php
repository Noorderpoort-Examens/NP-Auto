<?php

namespace App\Livewire;

use App\Models\Occasion;
use Livewire\Component;

class OccasionBoard extends Component
{
    public $occasion;

    public function mount($occasion)
    {
        $this->occasion = Occasion::where('id', $occasion)->firstOrFail();
    }

    public function render()
    {

        return view('livewire.occasion-board');
    }
}
