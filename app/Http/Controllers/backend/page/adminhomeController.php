<?php

namespace App\Http\Controllers\backend\page;

use App\Http\Controllers\Controller;
use App\Models\pageelements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminhomeController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }
        $pageelements=pageelements::all();
        return view('backend.pages.home',compact('pageelements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }

        //Banner text
        pageelements::where('row_type','banner_text')
        ->update(['link_or_text'=>$request->banner_title.'|'.$request->banner_text]);

        //Banner Button
        pageelements::where('row_type','banner_btn')
        ->update(['link_or_text'=>$request->banner_button_text.'|'.$request->banner_button_link]);

        session()->flash('success','Home Settings has been updated!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function success_massage(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('pages.home')) {
            return redirect()->route('admin.login');
        }

        //Success Massage
        pageelements::where('row_type','success_massage')
        ->update(['link_or_text'=>$request->success_massage]);

        session()->flash('success','Success Massage has been updated!');
        return back();
    }
}
