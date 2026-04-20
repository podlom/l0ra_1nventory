<?php

namespace App\Livewire\Drone;

use App\Models\Drone;
use Livewire\Attributes\Rule;
use Livewire\Component;

class DroneList extends Component
{
    #[Rule('required|min:3|string')]
    public $model = '';

    #[Rule('required|unique:drones,inventory_number')]
    public $inventory_number = '';

    // --- Inline edit fields ---
    public $editId = null;

    public $editModel = '';

    public $editInventory = '';

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

    public function edit($id)
    {
        $drone = Drone::findOrFail($id);

        $this->editId = $id;
        $this->editModel = $drone->model;
        $this->editInventory = $drone->inventory_number;
    }

    public function update()
    {
        $this->validate([
            'editModel' => 'required|min:3|string',
            'editInventory' => 'required|unique:drones,inventory_number,'.$this->editId,
        ]);

        Drone::find($this->editId)->update([
            'model' => $this->editModel,
            'inventory_number' => $this->editInventory,
        ]);

        $this->cancelEdit();
        session()->flash('message', 'Дані оновлено.');
    }

    public function cancelEdit()
    {
        $this->editId = null;
        $this->editModel = '';
        $this->editInventory = '';
    }

    public function delete($id)
    {
        Drone::find($id)->delete();
        session()->flash('message', 'Запис видалено.');
    }

    public function render()
    {
        return view('livewire.drone.list', [
            'drones' => Drone::latest()->get(),
        ]);
    }
}
