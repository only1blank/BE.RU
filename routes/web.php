<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DeliveryOrder;
use App\Http\Controllers\HomeController;
use App\Livewire\TrackPackage;
use App\Livewire\Adminpanel;
use App\Http\Controllers\PaymentController;
use App\Livewire\News;


Route::get('/delivery-order', function () {
    return view('delivery-order');
})->name('delivery-order')->middleware('auth');

Route::get('/create-order', function () {
    return view('create-order'); 
})->name('create-order')->middleware('auth');



Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');


Route::get('/track', function () {
    return view('track');
})->name('track');

Route::view('/', 'welcome');
Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::view('profile', 'profile')
    ->middleware(['auth', 'verified'])
    ->name('profile');

    Route::get('/admin', function () {
        return view('admin');
    })->middleware('auth')->name('admin');

    use App\Http\Middleware\EnsureUserIsAdmin;

    Route::get('/admin', function () {
        return view('admin');
    })->middleware(['auth', EnsureUserIsAdmin::class])->name('admin'); 

    Route::post('/pay', [PaymentController::class, 'handlePayment'])->name('pay');
Route::get('/news', News::class)->name('news');
require __DIR__.'/auth.php';






