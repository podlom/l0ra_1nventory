<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">
        {{ $ammo ? 'Редагувати запис' : 'Створити запис' }}
    </h1>

    <form wire:submit.prevent="save">

        <div class="mb-4">
            <label>Накладна</label>
            <select wire:model="invoice_id" class="input border p-2 rounded">
                <option value="">-- виберіть накладну --</option>
                @foreach($invoices as $inv)
                    <option value="{{ $inv->id }}">{{ $inv->number }}</option>
                @endforeach
            </select>
            @error('invoice_id') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label>№ з/п</label>
            <input type="number" min="0" wire:model="row_number" class="input border p-2 w-20 rounded">
        </div>

        <div class="mb-4">
            <label>Найменування</label>
            <input type="text" wire:model="equipment_name" class="input border p-2 rounded">
            @error('equipment_name') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label>Одиниця виміру</label>
            <select wire:model="unit_id" class="input border p-2 rounded">
                <option value="">-- виберіть одиницю --</option>
                @foreach($units as $u)
                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->full_name }})</option>
                @endforeach
            </select>
            @error('unit_id') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label>За штатом</label>
                <input type="number" min="0" wire:model="authorized_amount" class="input border p-2 w-20 rounded">
            </div>

            <div class="mb-4">
                <label>Нестача</label>
                <input type="number" min="0" wire:model="lack_amount" class="input border p-2 w-20 rounded">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label>В наявності</label>
                <input type="number" min="0" wire:model="in_stock" class="input border p-2 w-20 rounded">
            </div>

            <div class="mb-4">
                <label>По книзі обліку</label>
                <input type="number" min="0" wire:model="ledger_amount" class="input border p-2 w-20 rounded">
            </div>
        </div>

        <div class="mb-4">
            <label>Примітка</label>
            <textarea wire:model="description" class="input border p-8 w-120 rounded"></textarea>
        </div>

        <input type="hidden" name="return_url" value="{{ $return_url }}">

        <button class="btn btn-primary bg-blue-600 text-white hover:text-blue-900 px-4 py-2 rounded">Зберегти</button>
    </form>
</div>
