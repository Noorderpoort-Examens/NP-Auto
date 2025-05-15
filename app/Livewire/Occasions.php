<?php

namespace App\Livewire;

use App\Models\Occasion;
use Livewire\Component;
use Livewire\WithPagination;

class Occasions extends Component
{
    use WithPagination;

    public $is_archive = false;

    public function render()
    {
        $occasions = Occasion::all();

        return view('livewire.occasions', compact('occasions'));
    }
}
