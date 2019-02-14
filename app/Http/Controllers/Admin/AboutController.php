<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\About;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        return view('about');
    }

    public function show(Request $request, About $about)
    {
    	$about = $about->orderBy('id','desc')
                        ->take(10)
                        ->select()
                        ->get();

        return response()->json($about);
    }
}
