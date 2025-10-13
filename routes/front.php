<?php

use App\Http\Controllers\CertificationController;
use App\Http\Controllers\HomeFaqController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\WebHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
    Route::resource('admin-events', EventController::class);
    // Route::get('events', [EventController::class, 'index'])->name('events.index');
    // Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    // Route::post('events', [EventController::class, 'store'])->name('events.store');
    // Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    // Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('events/{event}/toggle', [EventController::class, 'toggleStatus'])->name('events.toggle');
});
Route::get('/', [WebHomeController::class, 'index'])->name('home');
Route::get('/tutors/category/{categorySlug}', [WebHomeController::class, 'getTutorsByCategory'])->name('tutors.byCategory');



Route::view('/contact', 'web-pages.contact')->name('contact');
Route::view('/courses', 'web-pages.courses.list')->name('courses');
Route::view('/details', 'web-pages.courses.details')->name('details');
Route::get('/events', [EventController::class, 'showEvents'])->name('events.list');
Route::get('/event/{slug}', [EventController::class, 'eventDetails'])->name('events.details');
Route::view('/about-us', 'web-pages.about')->name('about');
