<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Testimonial;
use App\Gallery;
use App\Faq;
use App\Image;
use App\Price;

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
    $page_title = 'Главная';
    $testimonials = Testimonial::all()->shuffle();
    $galleries = Gallery::all();
    $faqs = Faq::all();
    return view('index', compact('testimonials', 'galleries', 'faqs', 'page_title'));
})->name('index');

Route::post('ordernew', [OrderController::class, 'index']); 
 
Route::get('/about', function () {
    $page_title = 'О нас';
    $testimonials = Testimonial::all()->shuffle();
    $galleries = Gallery::all();
    $faqs = Faq::all();
    return view('about', compact('testimonials', 'galleries', 'faqs', 'page_title'));
})->name('about');

Route::get('/services/{name?}', function ($name) {
    $testimonials = Testimonial::all()->shuffle();
    $galleries = Gallery::all();
    $faqs = Faq::all();
    $images = Image::all();
    $prices = Price::all();
    return view('services', compact('testimonials', 'galleries', 'faqs', 'name', 'images', 'prices'));
})->name('services');

Route::get('/contacts', function () {
    $page_title = 'Контакты';
    $page_alias = 'contacts';
    $testimonials = Testimonial::all()->shuffle();
    $galleries = Gallery::all();
    $faqs = Faq::all();
    return view('contacts', compact('testimonials', 'galleries', 'faqs', 'page_title', 'page_alias'));
})->name('contacts');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
