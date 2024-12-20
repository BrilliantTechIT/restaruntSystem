<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
Route::get('/', function () {
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
