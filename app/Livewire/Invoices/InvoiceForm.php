<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Livewire\Component;


class InvoiceForm extends Component
{
    public ?Invoice $invoice = null;

    public $number;
    public $created_at;
    public $support_service_name;
    public $invoice_date;

    public function mount(Invoice $invoice = null)
    {
        if ($invoice) {
            $this->invoice = $invoice;
            $this->number = $invoice->number;
            $this->created_at = $invoice->created_at;
            $this->support_service_name = $invoice->support_service_name;
            $this->invoice_date = $invoice->invoice_date;
        }
    }

    public function save()
    {
        $data = $this->validate([
            'number' => 'required|string|max:255',
            'support_service_name' => 'nullable|string|max:255',
            'invoice_date' => 'nullable|date',
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
