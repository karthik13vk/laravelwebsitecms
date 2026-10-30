<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\FloatingImage;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)
            ->latest()
            ->get();
             $floatingImages = FloatingImage::where('is_active', true)
            ->latest()
            ->get();


        return view('frontend.home', compact(
              'testimonials',
            'floatingImages'
        ));


    }
}
