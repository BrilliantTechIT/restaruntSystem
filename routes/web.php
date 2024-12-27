<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Livewire\Home;
use App\Livewire\Category;
use App\Livewire\SubCategory;
use App\Livewire\Product;
use App\Livewire\Offers;
use App\Livewire\OffersProduct;
use App\Livewire\Sales;
use App\Livewire\Discounts;
Route::get('/', function () {
    // return Hash::make("hussam");
    $d=User::get();
    
    if(count($d)==0)
    {
        $d=new User();
        $d->name="admin";
        $d->email="admin@gmail.com";
        $d->password=Hash::make("admin");
        $d->save();

    }
    return view('auth.login');
});



Auth::routes();
Route::middleware('auth')->group(function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homePage', Home::class)->name('homePage');
Route::get('/Category', Category::class)->name('Category');
Route::get('/subCategory', SubCategory::class)->name('subCategory');
Route::get('/product', Product::class)->name('product');
Route::get('/Offers', Offers::class)->name('Offers');
Route::get('/Offersproduct/{id}', OffersProduct::class)->name('Offersproduct');
Route::get('/sales', Sales::class)->name('sales');
Route::get('/Discounts', Discounts::class)->name('Discounts');
Route::get('/print/{id}', [App\Http\Controllers\HomeController::class, 'print'])->name('print');
});