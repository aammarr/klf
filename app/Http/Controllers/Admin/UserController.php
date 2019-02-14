<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\FileUpload;

class UserController extends Controller
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

        return view('users');
    }

    public function show(Request $request, User $users)
    {
        $users = $users->orderBy('id', 'desc')
                    ->take(10)
                    ->select()
                    ->get();
        return response()->json($users);
    }

    public function imageStore(Request $request){
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/speaker_images'), $imageName);
        
        return response()->json(['success'=>'You have successfully upload image.']);
    }
}
