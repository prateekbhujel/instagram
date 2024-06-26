<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\Index;
use App\Livewire\Chat\Main;
use App\Livewire\Explore;
use App\Livewire\Home;
use App\Livewire\Post\View\Page;
use App\Livewire\Profile\Home as ProfileHome;
use App\Livewire\Profile\Reels;
use App\Livewire\Profile\Saved;
use App\Livewire\Reels as LivewireReels;
use Illuminate\Support\Facades\Route;






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware('auth')->group(function () {

    //Home Component
     Route::get('/',Home::class)->name('home');
    
    //Explore Component
    Route::get('/explore',Explore::class)->name('explore');

    //Reels Component
    Route::get('/reels', LivewireReels::class)->name('reels');
    
    //Post Page Modal
    Route::get('/post/{post}', Page::class)->name('post');


    //Chat Index and Component
    Route::get('/chat', Index::class)->name('chat');
    Route::get('/chat/{chat}', Main::class)->name('chat.main');


    //Profile Component
    Route::get('/profile/{user}',ProfileHome::class)->name('profile.home');
    Route::get('/profile/{user}/reels',Reels::class)->name('profile.reels');
    Route::get('/profile/{user}/saved',Saved::class)->name('profile.saved');


});



require __DIR__.'/auth.php';
