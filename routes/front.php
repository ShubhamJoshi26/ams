<?php

use App\Http\Controllers\CertificationController;
use App\Http\Controllers\HomeFaqController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\HeroController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('heros', HeroController::class);
    Route::get('heros/{hero}/toggle', [HeroController::class, 'toggleStatus'])->name('heros.toggle');

   Route::resource('certifications', CertificationController::class);
    Route::get('certifications/{certification}/toggle', [CertificationController::class, 'toggleStatus'])->name('certifications.toggle');

    Route::resource('steps', StepController::class);
    Route::get('steps/{step}/toggle', [StepController::class, 'toggleStatus'])->name('steps.toggle');

    Route::resource('tutors', TutorController::class);
    Route::get('tutors/{tutor}/toggle', [TutorController::class, 'toggleStatus'])->name('tutors.toggle');

    Route::resource('testimonials', TestimonialController::class);
    Route::get('testimonials/{testimonial}/toggle', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle');

    Route::resource('faqs', HomeFaqController::class);
    Route::get('faqs/{faq}/toggle', [HomeFaqController::class, 'toggleStatus'])->name('faqs.toggle');
});
Route::view('/', 'web-pages.index')->name('home');
Route::view('/contact', 'web-pages.contact')->name('contact');
Route::view('/about', 'web-pages.about')->name('about');
Route::view('/courses', 'web-pages.courses.list')->name('courses');
Route::view('/details', 'web-pages.courses.details')->name('details');
Route::view('/blogs', 'web-pages.articles.list')->name('blogs');
Route::view('/blog-details', 'web-pages.articles.details')->name('blog-details');
