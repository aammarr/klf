<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Speakers;
use DB;

class SpeakerController extends Controller
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

        return view('speakers');
    }

    public function show(Request $request, Speakers $speakers)
    {   
    	
        $speakers = $speakers->orderBy('id', 'desc')
                        ->select()
                        ->get();

        return response()->json($speakers);
    }

    public function store(Request $request){

        // $speaker_contact_number = $request->speaker_contact_number;
        $speaker_name       = $request->speaker_name;
        $speaker_description = $request->speaker_description;
        $speaker_avatar     = $request->speaker_avatar;

        $s = new Speakers();
        $s->speaker_name            = $speaker_name;
        $s->speaker_description     = $speaker_description;
        $s->speaker_avatar          = $speaker_avatar;
        $s->save();

        return response()->json($s);
    }

    public function imgStore(Request $request){
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/speaker_images'), $imageName);
        
        // $imgPath = public_path('images/speaker_images').'/'.$imageName;
        $imgPath = 'images/speaker_images/'.$imageName;
        $newSpeaker = Speakers::orderBy('id', 'desc')
                        ->select()
                        ->first();


        DB::table('speakers as s')
            ->where('s.id',$newSpeaker->id)
            ->update(array('speaker_avatar' => $imgPath));

        return response()->json(['success'=>'You have successfully upload image.']);
    }

    public function destroy(Request $request,$id){
        
        Speakers::findorFail($id)->delete();
        // return true;
    }
}
