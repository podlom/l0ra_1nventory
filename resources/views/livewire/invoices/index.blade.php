<div>
    <h1 class="text-2xl font-bold mb-4">Видаткові накладні</h1>

    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-4">Додати</a>

    <table class="table-auto w-full">
        <thead>
        <tr>
            <th>ID</th>
            <th>Номер</th>
            <th>Створено</th>
            <th>Назва служби</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->number }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->support_service_name }}</td>
                <td>
                    <a href="{{ route('invoices.edit', $invoice) }}" class="text-blue-600">Редагувати</a>
                    <button wire:click="delete({{ $invoice->id }})" class="text-red-600 ml-2">Видалити</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $invoices->links() }}
</div>
