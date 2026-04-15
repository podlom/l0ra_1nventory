<?php

namespace App\Livewire\Ammunition;

use App\Models\Ammunition;
use App\Models\Invoice;
use App\Models\Unit;
use Livewire\Component;

class AmmunitionForm extends Component
{
    public ?Ammunition $ammo = null;

    public $invoice_id;

    public $row_number;

    public $equipment_name;

    public $unit_id;

    public $authorized_amount;

    public $ledger_amount;

    public $in_stock;

    public $lack_amount;

    public $description;

    public string|null $return_url = null;

    public function mount(?Ammunition $ammo = null)
    {
        if ($ammo) {
            $this->ammo = $ammo;

            $this->invoice_id = $ammo->invoice_id;
            $this->row_number = $ammo->row_number;
            $this->equipment_name = $ammo->equipment_name;
            $this->unit_id = $ammo->unit_id;
            $this->authorized_amount = $ammo->authorized_amount;
            $this->ledger_amount = $ammo->ledger_amount;
            $this->in_stock = $ammo->in_stock;
            $this->lack_amount = $ammo->lack_amount;
            $this->description = $ammo->description;
        }

        $this->return_url = request()->query('return_url');
    }

    public function updated($field)
    {
        if (in_array($field, ['authorized_amount', 'in_stock'])) {
            $this->lack_amount = max(0, (int) $this->authorized_amount - (int) $this->in_stock);
        }
    }

    public function save()
    {
        $data = $this->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'row_number' => 'nullable|integer',
            'equipment_name' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'authorized_amount' => 'nullable|integer',
            'ledger_amount' => 'nullable|integer',
            'in_stock' => 'nullable|integer',
            'lack_amount' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        if ($this->ammo) {
            $this->ammo->update($data);
        } else {
            Ammunition::create($data);
        }

        return $this->return_url
            ? redirect()->to($this->return_url)
            : redirect()->route('ammunition.index');
    }

    public function render()
    {
        return view('livewire.ammunition.form', [
            'invoices' => Invoice::all(),
            'units' => Unit::all(),
            'return_url' => $this->return_url,
        ]);
    }
}
