<?php

namespace App\Livewire;

use App\Models\Occasion;
use Livewire\Component;
use Livewire\WithPagination;

class Occasions extends Component
{
    use WithPagination;

    public string $status = 'all';
    protected $listeners = [
        'filterUpdated' => 'updateFilter',
    ];

    public $is_archive = false;

    public function updateFilter($status)
    {
        $this->status = $status;
        $this->resetPage();
    }

    public function render()
    {
        $query = Occasion::query();

        if ($this->status === 'unsold') {
            $query->where('sold', false)->where('reserved', false);
        } elseif ($this->status === 'reserved') {
            $query->where('reserved', true)->where('sold', false);
        } elseif ($this->status === 'sold') {
            $query->where('sold', true);
        }

        $occasions = $this->is_archive
            ? $query->orderBy('created_at', 'desc')->paginate(12)
            : $query->orderBy('created_at', 'desc')->take(3)->get();

        return view('livewire.occasions', compact('occasions'));
    }
}
