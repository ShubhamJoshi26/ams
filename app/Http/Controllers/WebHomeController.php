<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Certification;
use App\Models\Event;
use App\Models\Hero;
use App\Models\Homefaqs;
use App\Models\Step;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WebHomeController extends Controller
{
    public function index()
    {
        $hero = Hero::where('status', 1)->first();
        $certifications = Certification::where('status', 1)->get();
        $steps = Step::where('status', 1)->get();
        $faqs = Homefaqs::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();
        $events = Event::where('status', 1)->get();
        $categories = Category::with('courses.tutors')->where('status', 1)->get();
        $allTutors = $categories
            ->flatMap(function ($category) {
                return $category->courses->flatMap->tutors;
            })
            ->unique('id')
            ->values();
        $categoryCourses = Category::with('courses')->where('status', 1)->get();
        // dd($categoryCourses);
        return view('web-pages.index', compact(
            'hero',
            'certifications',
            'steps',
            'categories',
            'allTutors',
            'faqs',
            'testimonials',
            'events',
            'categoryCourses'
        ));
    }

    /**
     * AJAX: Get tutors by category slug
     */
    public function getTutorsByCategory($categorySlug)
    {
        // dd($categorySlug);
        if ($categorySlug === 'all') {
            $tutors = Category::with('courses.tutors')
                ->get()
                ->flatMap(function ($category) {
                    return $category->courses->flatMap->tutors;
                })
                ->unique('id')
                ->values();
        } else {
            $category = Category::where('slug', $categorySlug)
                ->with('courses.tutors')
                ->first();

            $tutors = $category
                ? $category->courses->flatMap->tutors->unique('id')->values()
                : collect();
        }

        return Response::json($tutors);
    }
}
