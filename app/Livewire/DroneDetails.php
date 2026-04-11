<?php

namespace App\Livewire;

use App\Models\Drone;
use Livewire\Component;

class DroneDetails extends Component
{
    public Drone $drone; // Приймаємо об'єкт дрона
    public $itemName, $itemQty = 1, $itemPrice;

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

    public function render()
    {
        return view('livewire.drone-details', [
            'items' => $this->drone->equipment()->get()
        ]);
    }
}
