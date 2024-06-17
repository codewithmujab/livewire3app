<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class ShowInvoice extends Component
{
    public Invoice $invoice;

    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function download()
    {
        //return Storage::disk('invoices')->download('invoice.csv');
        return response()->download(
            $this->invoice->file_path,
            'invoice.pdf'
        );
    }
    public function render()
    {
        return view('livewire.show-invoice');
    }
}
