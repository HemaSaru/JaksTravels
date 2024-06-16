<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SoapAPIController;

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
    return view('Front.home');
});
Route::get('/home', function () {
    return view('Front.home')->name('home');
});

Route::get('/about', [MainController::class, 'Fabout'])-> name('Fabout');
Route::get('/contact-us',  [MainController::class, 'ContactUs'])->name('ContactUs');
Route::get('/flights',  [MainController::class, 'Flights'])->name('Flights');

Route::get('/userAgreement',  [MainController::class, 'userAgreement'])->name('userAgreement');
Route::get('/privacyPolicy',  [MainController::class, 'privacyPolicy'])->name('privacyPolicy');

Route::any('/contactForm', [MainController::class, 'contactForm'])-> name('contactForm');

/*  API routes */
Route::post('/get-completion-list', [SoapAPIController::class, 'getCompletionList'])->name('getCompletionList');
Route::post('/get-airlines-list', [SoapAPIController::class, 'getAirlinesList'])->name('getAirlinesList');
Route::post('/searchFlight', [SoapAPIController::class, 'searchFlight'])->name('searchFlight');
Route::get('/searchFlight', [MainController::class, 'Flights'])-> name('Flights');

//Route::post('/get-completion-list', [SoapAPIController::class, 'testAPI'])-> name('testAPI');
