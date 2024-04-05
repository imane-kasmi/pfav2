<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'displayNotes'])->name('notes.display-note');
Route::get('/notes/create', [NoteController::class, 'addNote'])->name('notes.add');
Route::post('/notes', [NoteController::class, 'storeNote'])->name('notes.store');