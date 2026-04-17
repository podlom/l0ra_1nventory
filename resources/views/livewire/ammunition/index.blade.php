<div>
    <h1 class="text-2xl font-bold mb-4">База майна підрозділів 33 ОМБР РБПАК</h1>

    <div class="text-center">
        <a href="{{ route('ammunition.create', ['return_url' => $returnUrl]) }}"
           title="Додати"
           class="btn btn-primary bg-blue-600 text-white font-bold hover:text-blue-900 px-4 py-2 rounded">Додати</a>
    </div>

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
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Дії</th>
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
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center justify-end space-x-4">
                        <a href="{{ route('ammunition.edit', $item) }}"
                           title="Редагувати"
                           class="text-green-600 hover:text-green-900">
                            <x-heroicon-o-pencil class="w-5 h-5"/>
                        </a>

                        <button wire:click="delete({{ $item->id }})"
                                title="Видалити"
                                class="text-red-600 hover:text-red-900">
                            <x-heroicon-o-trash class="w-5 h-5"/>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $items->links() }}
</div>
