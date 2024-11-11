<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;

Route::get('/login', [AdminController::class, 'index'])->name('login')->middleware('guest:admin');
Route::post('/login_auth', [AdminController::class, 'login_auth'])->name('login_post');


Route::get('/logout', [AdminController::class, 'logout_page'])->name('logout.page');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/movies', [MovieController::class, 'index'])->name('movies');
    Route::get('/movies/book/{movie:id}', [MovieController::class, 'book'])->name('movies.book');
    Route::get('/movies/tickets/{movie:id}', [TicketController::class, 'index'])->name('movies.tickets');
    
    Route::post('/ticket/submit', [TicketController::class, 'store'])->name('ticket.submit');
    Route::put('/ticket/checkin/{ticket}', [TicketController::class, 'checkIn'])->name('ticket.checkin');
    Route::delete('/ticket/delete/{ticket}', [TicketController::class, 'destroy'])->name('ticket.delete');
    Route::get('/ticket/edit/{ticket}', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::put('/ticket/update/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
});
