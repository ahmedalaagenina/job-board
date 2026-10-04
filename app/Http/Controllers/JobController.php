<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::getMockData();
        return view('job.index', ['jobs' => $jobs]);
    }
}
