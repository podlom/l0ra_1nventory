<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;

class UnitIndex extends Component
{
    const UNIT_PAGER_SIZE = 10;

    use WithPagination;

    public function delete(Unit $unit)
    {
        $unit->delete();
        session()->flash('success', 'Одиницю видалено');
    }

    public function render()
    {
        return view('livewire.units.index', [
            'units' => Unit::paginate(self::UNIT_PAGER_SIZE),
        ]);
    }
}
