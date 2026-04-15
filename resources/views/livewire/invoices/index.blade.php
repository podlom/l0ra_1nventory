<div>
    <h1 class="text-2xl font-bold mb-4">Видаткові накладні</h1>

    <a href="{{ route('invoices.create') }}" class="btn btn-primary bg-blue-600 text-white hover:text-blue-900 px-4 py-2 rounded">Додати</a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Номер</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Створено</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Назва служби</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дії</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($invoices as $invoice)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $invoice->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $invoice->number }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $invoice->invoice_date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $invoice->support_service_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('invoices.edit', $invoice) }}" class="text-blue-600 hover:text-blue-900 mr-4">Редагувати</a>
                        <button wire:click="delete({{ $invoice->id }})" class="text-red-600 hover:text-red-900 ml-2">Видалити</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $invoices->links() }}
</div>
