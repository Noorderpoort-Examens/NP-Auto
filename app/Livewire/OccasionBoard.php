<?php

namespace App\Livewire;

use App\Models\Occasion;
use Carbon\Carbon;
use Livewire\Component;

class OccasionBoard extends Component
{
    public $occasion;

    public function mount($occasion)
    {
        $this->occasion = Occasion::where('licenceplate', $occasion)->firstOrFail();

        $carbonTS = Carbon::parse($this->occasion->apk);

        $this->occasion->apk = $carbonTS->format('d-M-Y');
    }

    public function render()
    {
        return view('livewire.occasion-board');
    }
}
