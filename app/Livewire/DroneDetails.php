<?php

namespace App\Livewire;

use App\Models\Drone;
use Livewire\Component;

class DroneDetails extends Component
{
    public Drone $drone; // Приймаємо об'єкт дрона

    public $itemName;

    public $itemQty = 1;

    public $itemPrice;

    public $editId = null;

    public $confirmDeleteId = null;

    public function addItem()
    {
        $this->validate([
            'itemName' => 'required',
            'itemQty' => 'required|integer|min:1',
        ]);

        $this->drone->equipment()->create([
            'name' => $this->itemName,
            'quantity' => $this->itemQty,
            'price' => $this->itemPrice,
        ]);

        $this->reset(['itemName', 'itemQty', 'itemPrice']);
    }

    public function editItem($id)
    {
        $item = $this->drone->equipment()->find($id);

        $this->editId = $id;
        $this->itemName = $item->name;
        $this->itemQty = $item->quantity;
        $this->itemPrice = $item->price;
    }

    public function updateItem()
    {
        $this->validate([
            'itemName' => 'required',
            'itemQty' => 'required|integer|min:1',
        ]);

        $item = $this->drone->equipment()->find($this->editId);

        $item->update([
            'name' => $this->itemName,
            'quantity' => $this->itemQty,
            'price' => $this->itemPrice,
        ]);

        $this->reset(['itemName', 'itemQty', 'itemPrice', 'editId']);
    }

    public function askDelete($id)
    {
        $this->confirmDeleteId = $id;
    }

    public function deleteItem()
    {
        $this->drone->equipment()->find($this->confirmDeleteId)->delete();
        $this->confirmDeleteId = null;
    }

    public function render()
    {
        return view('livewire.drone-details', [
            'items' => $this->drone->equipment()->get(),
        ]);
    }
}
