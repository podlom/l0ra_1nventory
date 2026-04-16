<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Облік дронів 33 ОМБР РБПАК</h1>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md mb-8 border border-gray-200">
        <h2 class="text-lg font-semibold mb-4">Додати новий дрон</h2>
        <form wire:submit="save" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700">Модель</label>
                <input type="text" wire:model="model" placeholder="Напр: Mavic 3T"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('model') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Інвентарний №</label>
                <input type="text" wire:model="inventory_number" placeholder="ID номер 1581..."
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('inventory_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-600 hover:text-blue-900 text-white font-bold py-2 px-4 rounded transition">
                Додати в базу
            </button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Модель</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Інвентарний №</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Дії</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($drones as $drone)
                <tr wire:key="{{ $drone->id }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $drone->model }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">
                        {{ $drone->inventory_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('drone.show', $drone->id) }}" class="text-blue-600 hover:text-blue-900 mr-4">Комплектація</a>
                        <button wire:click="delete({{ $drone->id }})"
                                wire:confirm="Ви впевнені, що хочете видалити цей дрон?"
                                class="text-red-600 hover:text-red-900">Видалити</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
