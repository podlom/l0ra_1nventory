<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Livewire\Component;


class InvoiceForm extends Component
{
    public ?Invoice $invoice = null;

    public $number;

    public $created_at;

    public function mount(Invoice $invoice = null)
    {
        if ($invoice) {
            $this->invoice = $invoice;
            $this->number = $invoice->number;
            $this->created_at = $invoice->created_at;
        }
    }

    public function save()
    {
        $data = $this->validate([
            'number' => 'required|string|max:255',
        ]);

        if ($this->invoice) {
            $this->invoice->update($data);
        } else {
            Invoice::create($data);
        }

        return redirect()->route('invoices.index');
    }

    public function render()
    {
        return view('livewire.invoices.form');
    }
}
