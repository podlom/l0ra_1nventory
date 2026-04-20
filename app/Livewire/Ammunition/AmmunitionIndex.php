<?php

namespace App\Livewire\Ammunition;

use App\Models\Ammunition;
use Livewire\Component;
use Livewire\WithPagination;

class AmmunitionIndex extends Component
{
    const AMUNITION_PAGER_SIZE = 20;

    use WithPagination;

    protected $queryString = ['page'];

    public ?string $page = null;

    public function delete(Ammunition $ammo)
    {
        $ammo->delete();
        session()->flash('success', 'Запис видалено');
    }

    public function getReturnUrlProperty(): string
    {
        $currentPage = $this->getPage();

        $this->page = $currentPage;

        if (! empty($currentPage) && ($currentPage > 1)) {
            return route('ammunition.index', ['page' => $currentPage]);
        }

        return route('ammunition.index');
    }

    public function render()
    {
        return view('livewire.ammunition.index', [
            'items' => Ammunition::with(['invoice', 'unit'])->paginate(self::AMUNITION_PAGER_SIZE),
            'returnUrl' => $this->getReturnUrlProperty(),
        ]);
    }
}
