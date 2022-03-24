<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplicationRequest;
use App\Models\Application;
use App\Models\SSL;
use App\Services\SSLInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ApplicationController extends Controller
{
    public function show(Application $application)
    {
        return view('application.show')->with(['application' => $application]);
    }

    public function store(CreateApplicationRequest $request)
    {
        $application = Application::create(Arr::except($request->toArray(), ['_token']));

        $SSLInfo = (new SSLInfo($request->get('url')))->handle();

        SSL::create(Arr::add($SSLInfo, 'application_id', $application->id));

        return redirect('/');
    }

    public function create()
    {
        return view('application.create');
    }
}
