<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index')
            ->with([
                'applications' => Application::all()
                ]);
    }
}
