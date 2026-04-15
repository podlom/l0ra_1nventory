<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">
        {{ $ammo ? 'Редагувати запис' : 'Створити запис' }}
    </h1>

    <form wire:submit.prevent="save">

        <div class="mb-4">
            <label>Накладна</label>
            <select wire:model="invoice_id" class="input">
                <option value="">-- виберіть накладну --</option>
                @foreach($invoices as $inv)
                    <option value="{{ $inv->id }}">{{ $inv->number }}</option>
                @endforeach
            </select>
            @error('invoice_id') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label>№ з/п</label>
            <input type="number" wire:model="row_number" class="input">
        </div>

        <div class="mb-4">
            <label>Найменування</label>
            <input type="text" wire:model="equipment_name" class="input">
            @error('equipment_name') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label>Одиниця виміру</label>
            <select wire:model="unit_id" class="input">
                <option value="">-- виберіть одиницю --</option>
                @foreach($units as $u)
                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->full_name }})</option>
                @endforeach
            </select>
            @error('unit_id') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <label>За штатом</label>
                <input type="number" wire:model="authorized_amount" class="input">
            </div>

            <div>
                <label>В наявності</label>
                <input type="number" wire:model="in_stock" class="input">
            </div>

            <div>
                <label>Нестача</label>
                <input type="number" wire:model="lack_amount" class="input" readonly>
            </div>
        </div>

        <div class="mb-4">
            <label>По книзі обліку</label>
            <input type="number" wire:model="ledger_amount" class="input">
        </div>

        <div class="mb-4">
            <label>Примітка</label>
            <textarea wire:model="description" class="input"></textarea>
        </div>

        <button class="btn btn-primary">Зберегти</button>
    </form>
</div>
