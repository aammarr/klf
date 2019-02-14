<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prize_awards;
use DB;

class PrizeController extends Controller
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

        return view('prizes');
    }

    public function show(Request $request, Prize_awards $prizes)
    {
    	$prizes = $prizes->orderBy('id', 'desc')
                        ->select()
                        ->get();
      
        return response()->json($prizes);
    }

    public function store(Request $request){
        
        /*$response = DB::table('prize_awards')->insert([
                    'prize_name' => $request->prize_name,
                    'prize_details' => $request->prize_details,
                    'prize_avatar' => $request->prize_avatar
                ]);*/

        $p = new Prize_awards();
        $p->prize_name      = $request->prize_name;
        $p->prize_details   = $request->prize_details;
        $p->prize_avatar    = $request->prize_avatar;
        $p->save();

        return response()->json($p);
    }

    public function destroy(Request $request,$id){
        
        Prize_awards::findorFail($id)->delete();
        // return true;
    }
}
