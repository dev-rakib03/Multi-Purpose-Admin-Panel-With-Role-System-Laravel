<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\operator;
use App\Models\pageelements;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $pageelements=pageelements::all();
        return view('frontend.pages.home.index',compact('pageelements'));
    }
}
