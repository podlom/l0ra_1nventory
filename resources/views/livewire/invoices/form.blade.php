<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">
        {{ $invoice ? 'Редагувати накладну' : 'Створити накладну' }}
    </h1>

    <form wire:submit.prevent="save">
        <div class="mb-4">

            <div>
                <label>Номер накладної</label>
                <input type="text" wire:model="number" class="border p-2 rounded">
            </div>

            <div>
                <label>Дата накладної</label>
                <input type="date" wire:model="invoice_date"  class="border p-2 rounded">
            </div>

            <div>
                <label>Підрозділ / служба забезпечення</label>
                <input type="text" wire:model="support_service_name"  class="border p-2 rounded">
            </div>

            @error('number')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-primary bg-blue-600 text-white hover:text-blue-900 px-4 py-2 rounded">Зберегти</button>
    </form>
</div>
