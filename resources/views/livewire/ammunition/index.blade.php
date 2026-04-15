<div>
    <h1 class="text-2xl font-bold mb-4">База майна</h1>

    <a href="{{ route('ammunition.create') }}" class="btn btn-primary mb-4">Додати</a>

    <table class="table-auto w-full">
        <thead>
        <tr>
            <th>#</th>
            <th>Накладна</th>
            <th>Назва</th>
            <th>Одиниця</th>
            <th>За штатом</th>
            <th>В наявності</th>
            <th>Нестача</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->row_number }}</td>
                <td>{{ $item->invoice->number }}</td>
                <td>{{ $item->equipment_name }}</td>
                <td>{{ $item->unit->name }}</td>
                <td>{{ $item->authorized_amount }}</td>
                <td>{{ $item->in_stock }}</td>
                <td>{{ $item->lack_amount }}</td>
                <td>
                    <a href="{{ route('ammunition.edit', $item) }}" class="text-blue-600">Редагувати</a>
                    <button wire:click="delete({{ $item->id }})" class="text-red-600 ml-2">Видалити</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $items->links() }}
</div>
