<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Sponsors;
use DB;

class SponsorController extends Controller
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

        return view('sponsors');
    }

    public function show(Request $request, Sponsors $sponsors){
    	$sponsors = $sponsors->orderBy('id', 'desc')
                        ->select()
                        ->get();
                        
        return response()->json($sponsors);
    }

    public function store(Request $request){

        // $sponsors_name              = $request->sponsors_name;
        // $sponsors_description       = $request->sponsors_description;
        // $sponsors_avatar            = $request->sponsors_avatar;
        
        /*$response = DB::table('sponsors')->insert([
                    'sponsors_name' => $sponsors_name,
                    'sponsors_contact_number' => $sponsors_contact_number,
                    'sponsors_avatar' => $sponsors_avatar
                ]);*/

        $s = new Sponsors();
        $s->sponsors_name           = $request->sponsors_name;
        $s->sponsors_description    = $request->sponsor_description;
        $s->sponsors_avatar         = $request->sponsors_avatar;
        $s->save();
        
        return response()->json($s);
    }

    public function destroy(Request $request,$id){
        
        Sponsors::findorFail($id)->delete();
        // return true;
    }

    public function imgStore(Request $request){
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/sponsor_images'), $imageName);
        
        // $imgPath = public_path('images/speaker_images').'/'.$imageName;
        $imgPath = 'images/sponsor_images/'.$imageName;
        $newSponsor = Sponsors::orderBy('id', 'desc')
                        ->select()
                        ->first();

        DB::table('sponsors as s')
            ->where('s.id',$newSponsor->id)
            ->update(array('sponsors_avatar' => $imgPath));

        return response()->json(['success'=>'You have successfully upload image.']);
    }
}
