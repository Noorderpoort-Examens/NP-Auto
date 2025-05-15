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
        $occasions = $this->is_archive
            ? Occasion::orderBy('created_at', 'desc')->paginate(12) // For archive
            : Occasion::orderBy('created_at', 'desc')->take(4)->get(); // For home

        return view('livewire.occasions', compact('occasions'));
    }
}
