<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">
        {{ $invoice ? 'Редагувати накладну' : 'Створити накладну' }}
    </h1>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <div>
                <label>Номер накладної</label>
                <input type="text" wire:model="number" class="input">
            </div>

            <div>
                <label>Дата накладної</label>
                <input type="text" wire:model="created_at" class="input">
            </div>

            @error('number') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <button class="btn btn-primary">Зберегти</button>
    </form>
</div>
