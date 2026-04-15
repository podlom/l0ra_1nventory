<?php

namespace App\Livewire;

use App\Models\Drone;
use Livewire\Attributes\Rule;
use Livewire\Component;

class DroneList extends Component
{
    #[Rule('required|min:3|string')]
    public $model = '';

    #[Rule('required|unique:drones,inventory_number')]
    public $inventory_number = '';

    public function save()
    {
        // Валідація на основі атрибутів #[Rule]
        $this->validate();

        Drone::create([
            'model' => $this->model,
            'inventory_number' => $this->inventory_number,
        ]);

        // Очищення полів та сповіщення
        $this->reset(['model', 'inventory_number']);
        session()->flash('message', 'Дрон успішно доданий до бази.');
    }

    public function delete($id)
    {
        Drone::find($id)->delete();
        session()->flash('message', 'Запис видалено.');
    }

    public function render()
    {
        return view('livewire.drone-list', [
            'drones' => Drone::latest()->get(),
        ]);
    }
}
