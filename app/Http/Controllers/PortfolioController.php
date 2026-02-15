<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = Project::orderBy('featured', 'desc')
            ->orderBy('order', 'asc')
            ->get();

        return view('portfolio.index', compact('projects'));
    }

    public function show(Project $project): View
    {
        return view('portfolio.show', compact('project'));
    }
}
