<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'projectCount' => Project::count(),
            'featuredCount' => Project::where('is_featured', true)->count(),
            'serviceCount' => Service::count(),
            'skillCount' => Skill::count(),
            'testimonialCount' => Testimonial::count(),
            'experienceCount' => Experience::count(),
            'latestProjects' => Project::latest()->take(5)->get(),
        ]);
    }
}
