<div>
    <h1 class="text-2xl font-bold mb-4">Одиниці виміру</h1>

    <a href="{{ route('units.create') }}" class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded">Додати</a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Назва</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Повна назва</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дії</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($units as $unit)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $unit->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-bold">{{ $unit->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $unit->full_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('units.edit', $unit) }}" class="text-blue-600 hover:text-blue-900 mr-4">Редагувати</a>
                        <button wire:click="delete({{ $unit->id }})" class="text-red-600 hover:text-red-900 ml-2">Видалити</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $units->links() }}
</div>
