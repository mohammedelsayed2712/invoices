<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Auth::routes();
        Route::group(['middleware' => "auth:web"], function () {
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

            Route::resource('invoices', InvoiceController::class)->except('show');
            Route::resource('sections', SectionController::class)->except('show');
            Route::resource('products', App\Http\Controllers\ProductController::class)->except('show');

            Route::get('get-products/{section_id}', [InvoiceController::class, 'getProducts'])->name('get.products');

            // Route::get('/section/{id}', [InvoiceController::class, 'getproducts']);
            Route::get('/get-products/{section_id}', [InvoiceController::class, 'getproducts']);
        });
    }
);
