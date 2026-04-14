<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;


class InvoiceIndex extends Component
{
    use WithPagination;

    public function delete(Invoice $invoice)
    {
        $invoice->delete();
        session()->flash('success', 'Накладну видалено');
    }

    public function render()
    {
        return view('livewire.invoices.index', [
            'invoices' => Invoice::paginate(10),
        ]);
    }
}
