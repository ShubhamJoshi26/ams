<?php
use Illuminate\Support\Facades\Route;

Route::view('/', 'web-pages.index')->name('home');
Route::view('/contact', 'web-pages.contact')->name('contact');
Route::view('/about', 'web-pages.about')->name('about');
Route::view('/courses','web-pages.courses.list')->name('courses');
Route::view('/details','web-pages.courses.details')->name('details');