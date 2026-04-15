<?php

namespace App\Livewire\Ammunition;

use App\Models\Ammunition;
use Livewire\Component;
use Livewire\WithPagination;

class AmmunitionIndex extends Component
{
    use WithPagination;

    public function delete(Ammunition $ammo)
    {
        $ammo->delete();
        session()->flash('success', 'Запис видалено');
    }

    public function render()
    {
        return view('livewire.ammunition.index', [
            'items' => Ammunition::with(['invoice', 'unit'])->paginate(10),
        ]);
    }
}
