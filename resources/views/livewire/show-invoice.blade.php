<div>
    <h1>{{ $invoice->title }}</h1>

    <span>{{ $invoice->date }}</span>
    <span>{{ $invoice->amount }}</span>

    <button type="button" wire:click="download">Download</button>
</div>
