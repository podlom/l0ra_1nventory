<?php

use App\Livewire\DroneList;
use App\Livewire\DroneDetails;
use App\Livewire\Units\UnitIndex;
use App\Livewire\Units\UnitForm;
use App\Livewire\Invoices\InvoiceIndex;
use App\Livewire\Invoices\InvoiceForm;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Список усіх дронів
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
