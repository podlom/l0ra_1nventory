<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;

class UnitIndex extends Component
{
    use WithPagination;

    public function delete(Unit $unit)
    {
        $unit->delete();
        session()->flash('success', 'Одиницю видалено');
    }

    public function render()
    {
        return view('livewire.units.index', [
            'units' => Unit::paginate(10),
        ]);
    }
}
