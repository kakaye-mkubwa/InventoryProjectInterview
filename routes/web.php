<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/index', function () {
//    return view('sales');
    return redirect('/sales');
})->middleware(['auth'])->name('index');;

//Route::get('/dashboard', function () {
//    return view('auth.login');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

if (!function_exists('prefixActive')) {
    function prefixActive($prefixName)
    {
        return request()->route()->getPrefix() == $prefixName ? 'active' : '';
    }
}

if (!function_exists('prefixBlock')) {
    function prefixBlock($prefixName)
    {
        return request()->route()->getPrefix() == $prefixName ? 'block' : 'none';
    }
}

if (!function_exists('routeActive')) {
    function routeActive($routeName)
    {
        return request()->routeIs($routeName) ? 'active' : '';
    }
}
