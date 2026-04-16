<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class UnitForm extends Component
{
    public ?Unit $unit = null;

    public $name;

    public $full_name;

    public function mount(?Unit $unit = null)
    {
        if ($unit) {
            $this->unit = $unit;
            $this->name = $unit->name;
            $this->full_name = $unit->full_name;
        }
    }

    public function save()
    {
        $data = $this->validate([
            'name' => 'required|string|min:1|max:255',
            'full_name' => 'string|max:255',
        ]);

        if ($this->unit) {
            $this->unit->update($data);
        } else {
            Unit::create($data);
        }

        return redirect()->route('units.index');
    }

    public function render()
    {
        return view('livewire.units.form');
    }
}
