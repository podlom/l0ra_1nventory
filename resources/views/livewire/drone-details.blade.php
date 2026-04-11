<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Комплектація: {{ $drone->model }} {{ $drone->inventory_number }}</h2>

    <form wire:submit.prevent="addItem" class="flex gap-2 mb-6">
        <input type="text" wire:model="itemName" placeholder="Назва (напр. Кабель)" class="border p-2 rounded">
        <input type="number" wire:model="itemQty" placeholder="К-сть" class="border p-2 w-20 rounded">
        <input type="number" wire:model="itemPrice" placeholder="Ціна" class="border p-2 rounded">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Додати</button>
    </form>

    <table class="w-full border-collapse border">
        <thead>
        <tr class="bg-gray-100">
            <th class="border p-2 text-left">Назва</th>
            <th class="border p-2">К-сть</th>
            <th class="border p-2">Ціна</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td class="border p-2">{{ $item->name }}</td>
                <td class="border p-2 text-center">{{ $item->quantity }}</td>
                <td class="border p-2 text-right">{{ $item->price }} грн</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
