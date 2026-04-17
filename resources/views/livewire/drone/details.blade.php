<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Комплектація: {{ $drone->model }} {{ $drone->inventory_number }}</h2>

    @if($confirmDeleteId)
		<div class="p-4 bg-red-100 border border-red-300 rounded mb-4">
			<p class="mb-2">Точно видалити цей елемент?</p>
			<button wire:click="deleteItem" class="bg-red-600 text-white px-3 py-1 rounded">Так</button>
			<button wire:click="$set('confirmDeleteId', null)" class="bg-gray-500 text-white px-3 py-1 rounded">Ні</button>
		</div>
	@endif

    <div class="bg-white p-6 rounded-lg shadow-md mb-8 border border-gray-200">
        <form wire:submit.prevent="{{ $editId ? 'updateItem' : 'addItem' }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <div class="md:col-span-1.5">
                <input type="text" wire:model="itemName" placeholder="Назва" class="mt-1 block w-full border p-2 rounded">
            </div>

            <div class="md:col-span-2">
                <input type="number" wire:model="itemQty" placeholder="К-сть" class="border p-2 w-20 rounded">

                <select wire:model="itemUnitId" class="input border p-2 rounded">
                    <option value="">-- Од. виміру --</option>
                    @foreach($units as $u)
                        <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->full_name }})</option>
                    @endforeach
                </select>
                @error('itemUnitId') <p class="text-red-600">{{ $message }}</p> @enderror

                <input type="number" wire:model="itemPrice" placeholder="Вартість, грн" class="border p-2 rounded">

                @if($editId)
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Оновити</button>
                    <button type="button" wire:click="$set('editId', null)" class="bg-gray-500 text-white px-4 py-2 rounded">Скасувати</button>
                @else
                    <button type="submit" class="bg-blue-600 hover:text-blue-900 text-white px-4 py-2 rounded">Додати</button>
                @endif
            </div>
        </form>
    </div>

    <table class="w-full border-collapse border">
		<thead>
		<tr class="bg-gray-100">
			<th class="border p-2 text-left">Назва</th>
			<th class="border p-2">Кількість</th>
			<th class="border p-2">Од. виміру</th>
			<th class="border p-2">Вартість, грн</th>
			<th class="border p-2 w-24">Дії</th>
		</tr>
		</thead>
		<tbody>
		@foreach($items as $item)
			<tr>
				<td class="border p-2">{{ $item->name }}</td>
				<td class="border p-2 text-center">{{ $item->quantity }}</td>
				<td class="border p-2 text-center">{{ $item->unit->name ?? '—' }}</td>
				<td class="border p-2 text-right">{{ $item->price ?? '-' }}</td>
				<td class="border p-2">
                    <div class="flex items-center space-x-3">
                        <button wire:click="editItem({{ $item->id }})"
                                title="Редагувати"
                                class="text-green-600 hover:text-green-900 mr-4">
                            <x-heroicon-o-pencil class="w-5 h-5"/>
                        </button>

                        <button wire:click="askDelete({{ $item->id }})"
                                title="Видалити"
                                class="text-red-600 hover:text-red-900 mr-4">
                            <x-heroicon-o-trash class="w-5 h-5"/>
                        </button>
                    </div>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
