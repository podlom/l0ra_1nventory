<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">
        {{ $unit ? 'Редагувати одиницю' : 'Створити одиницю' }}
    </h1>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label>Назва</label>
            <input type="text" wire:model="name" class="input">
            @error('name') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label>Повна назва</label>
            <input type="text" wire:model="full_name" class="input">
            @error('full_name') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <button class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded">Зберегти</button>
    </form>
</div>
