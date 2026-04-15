<?php

use App\Livewire\Ammunition\AmmunitionForm;
use App\Livewire\Ammunition\AmmunitionIndex;
use App\Livewire\DroneDetails;
use App\Livewire\DroneList;
use App\Livewire\HomePage;
use App\Livewire\Invoices\InvoiceForm;
use App\Livewire\Invoices\InvoiceIndex;
use App\Livewire\Units\UnitForm;
use App\Livewire\Units\UnitIndex;
use Illuminate\Support\Facades\Route;

// Головна сторінка
Route::get('/', HomePage::class)->name('home');

// Облік дронів
Route::get('/drones', DroneList::class)->name('drones.index');
// Сторінка конкретного дрона (параметр {drone} автоматично знайде модель у БД)
Route::get('/drones/{drone}', DroneDetails::class)->name('drone.show');

// Одиниці виміру
Route::get('/units', UnitIndex::class)->name('units.index');
Route::get('/units/create', UnitForm::class)->name('units.create');
Route::get('/units/{unit}/edit', UnitForm::class)->name('units.edit');

// Накладні вимоги
Route::get('/invoices', InvoiceIndex::class)->name('invoices.index');
Route::get('/invoices/create', InvoiceForm::class)->name('invoices.create');
Route::get('/invoices/{invoice}/edit', InvoiceForm::class)->name('invoices.edit');

// База майна
Route::get('/ammunition', AmmunitionIndex::class)->name('ammunition.index');
Route::get('/ammunition/create', AmmunitionForm::class)->name('ammunition.create');
Route::get('/ammunition/{ammo}/edit', AmmunitionForm::class)->name('ammunition.edit');
