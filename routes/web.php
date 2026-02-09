<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/donors');
Route::resource('donors', \App\Http\Controllers\DonorController::class);
Route::post('queues', [\App\Http\Controllers\QueueController::class, 'store'])->name('queues.store');
Route::get('queues/{queue}/print', [\App\Http\Controllers\QueueController::class, 'print'])->name('queues.print');
