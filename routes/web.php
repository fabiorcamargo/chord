<?php

use App\Filament\Pages\ShowSlides;
use App\Livewire\SlideShow;
use App\Models\Verse;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('book', function () {



})->name('user');


Route::get('/', function (){
    return view('welcome');
});

Route::get('/t', function () {
    event(new \App\Events\SlideConfigEvent());
    Redis::set('test:1:key', 'Value');
    dd('Event Run Successfully.');
    });
