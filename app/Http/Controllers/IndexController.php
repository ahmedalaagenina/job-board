<?php

namespace App\Http\Controllers;

use Laravel\Mcp\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('index', ['title' => 'Job Board']);
    }
}
