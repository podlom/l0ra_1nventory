<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceIndex extends Component
{
    const INVOICE_PAGER_SIZE = 15;

    use WithPagination;

    public function delete(Invoice $invoice)
    {
        $invoice->delete();
        session()->flash('success', 'Накладну видалено');
    }

    public function render()
    {
        return view('livewire.invoices.index', [
            'invoices' => Invoice::orderByDesc('id')->paginate(self::INVOICE_PAGER_SIZE),
        ]);
    }
}
