<?php

use App\Livewire\DroneList;
use App\Livewire\DroneDetails;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Список усіх дронів
Route::get('/', DroneList::class)->name('drones.index');

// Сторінка конкретного дрона (параметр {drone} автоматично знайде модель у БД)
Route::get('/drones/{drone}', DroneDetails::class)->name('drone.show');
