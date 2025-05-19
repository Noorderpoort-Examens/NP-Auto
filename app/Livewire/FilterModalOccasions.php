<?php

namespace App\Livewire;

use Livewire\Component;

class FilterModalOccasions extends Component
{
    public string $status = 'all';
    public bool $isOpen = false;

    public function applyFilter($status)
    {
        $this->status = $status;
        $this->dispatch('filterUpdated', status: $status);
        $this->closeModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.filter-modal-occasions');
    }
}
