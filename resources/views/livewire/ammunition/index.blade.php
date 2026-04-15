<div>
    <h1 class="text-2xl font-bold mb-4">База майна підрозділів 33 ОМБР РБПАК</h1>

    <a href="{{ route('ammunition.create', ['return_url' => $returnUrl]) }}" class="btn btn-primary bg-blue-600 text-white hover:text-blue-900 px-4 py-2 rounded">
        Додати
    </a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Накладна</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Назва</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Одиниця</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">За штатом</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">В наявності</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Примітка</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дії</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($items as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->row_number }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $item->invoice->number }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $item->equipment_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $item->unit->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $item->authorized_amount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $item->in_stock }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $item->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('ammunition.edit', $item) }}" class="text-blue-600 hover:text-blue-900 mr-4">Редагувати</a>
                        <button wire:click="delete({{ $item->id }})" class="text-red-600 hover:text-red-900 ml-2">Видалити</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $items->links() }}
</div>
