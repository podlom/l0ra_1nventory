<div>
    <h1 class="text-2xl font-bold mb-4">Одиниці виміру</h1>

    <a href="{{ route('units.create') }}" class="btn btn-primary mb-4">Додати</a>

    <table class="table-auto w-full">
        <thead>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Повна назва</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($units as $unit)
            <tr>
                <td>{{ $unit->id }}</td>
                <td>{{ $unit->name }}</td>
                <td>{{ $unit->full_name }}</td>
                <td>
                    <a href="{{ route('units.edit', $unit) }}" class="text-blue-600">Редагувати</a>
                    <button wire:click="delete({{ $unit->id }})" class="text-red-600 ml-2">Видалити</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $units->links() }}
</div>
