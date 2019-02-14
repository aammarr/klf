<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\User;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = $this->validate($request,[
            'full_name' => 'required|max:255',
            'email'     => 'required|email',
            'phone'     => 'min:11|max:11',
            'social_id' => '',
        ]);

       try{

            $newUser = DB::table('users as u')
                        ->where('u.email',$request->email)
                        ->select('u.*')
                        ->first();
            
            if(empty($newUser)){
                return response()->json([
                    'status'    =>  'OK',
                    'message'   =>  'success',
                    'response'  =>  User::Create([
                                    'email'         => $request['email'],
                                    'full_name'     => $request['full_name'],
                                    'phone_number'  => $request['phone'],
                                    'role_id'       => '3',
                                    'social_id'     => $request['social_id']
                                    ])
                ]);

            }
            else{
                
                return response()->json([
                    'status'=>'OK',
                    'message'=>'success',
                    'response'=>$newUser
                ]); 
            }
            

            
        }
        catch(Exception $e){
            // print_r($e);
            return response()->json(['status' => 'fail'],401);
        }

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
        //
    }
}
