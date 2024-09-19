<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\operator;
use App\Models\pageelements;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $pageelements=pageelements::all();
        return view('frontend.home.index',compact('pageelements'));
    }
}
