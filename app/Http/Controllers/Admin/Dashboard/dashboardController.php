<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\offer;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
                    $this->user = Auth::guard('admin')->user();
                    return $next($request);
                });

    }
    public function index()
    {
        if (is_null($this->user)) {
            return redirect()->route('admin.login');
        }
        return view('admin.dashboard.dashboard');
    }
}
