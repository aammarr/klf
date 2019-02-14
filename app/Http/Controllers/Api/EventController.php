<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events;

use Config;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }  

    public function eventDay1(Request $request){
        /*$selectedTime = "9:15:00";
        $endTime = strtotime("+120 minutes", strtotime($selectedTime));
        echo date('h:i:s', $endTime);
        exit;*/
        // request['date']

        $date = Config::get('constants.event.day1');

        $events = Events::orderby('event_date','asc')
                    ->orderBy('event_startTime', 'asc')
                    ->where('event_date',$date)
                    ->whereNull('deleted_at')
                    ->select()
                    ->get();

        if(sizeof($events)==0){

            return response()->json([
                    'status'    =>  'OK',
                    'message'   =>  'success',
                    'response'  =>  []
                ]);
        }
        
        $timeStart; $timeEnd; $endTime; $timeSlots; $a; $b; $timeDuration;

        foreach ($events as $res) {    
            $timeStart[] = $res->event_startTime;
            $timeDuration[] =  $res->event_duration;
            
        }
        for ($i=0; $i <sizeof($timeStart); $i++) { 
            $a[$i] = "+".$timeDuration[$i]." minutes";
            $a[$i] = strtotime($a[$i], strtotime($timeStart[$i]));
            $b[$i] = date('H:i:s', $a[$i]);
            $c[$i] = date('H:i:s', strtotime($timeStart[$i]));
            $c[$i] = date("h:i:s A",strtotime($c[$i]) );
            $b[$i] = date("h:i:s A",strtotime($b[$i]) );

            $timeSlots[$i] = $c[$i]. " - ".$b[$i];
        }
        
        foreach ($timeSlots as $key => $value) {

            $a=explode(" -",$value);
            $f=date("H:i:s", strtotime($a[0]));

            

            $d = DB::table('events as e')
                    ->orderBy('event_startTime', 'asc')
                    ->where('event_startTime',$f)
                    ->where('event_date',$date)
                    ->whereNull('deleted_at')
                    ->select()
                    ->get();

            $response[] = array(
                    
                    'timeslots' => $value,
                    'events' => $d
            );
        }

        return response()->json([
                    'status'    =>  'OK',
                    'message'   =>  'success',
                    'response'  =>  $response
                ]);
    }


    public function eventDay2(Request $request){
        
        // $eventDay2 = "2019-03-02";      //yy-mm-dd
        $date = Config::get('constants.event.day2');

        $events = Events::orderby('event_date','asc')
                    ->orderBy('event_startTime', 'asc')
                    ->where('event_date',$date)
                    ->whereNull('deleted_at')
                    ->select()
                    ->get();

        if(sizeof($events)==0){

            return response()->json([
                    'status'    =>  'OK',
                    'message'   =>  'success',
                    'response'  =>  []
                ]);
        }

        $timeStart; $timeEnd; $endTime; $timeSlots; $a; $b; $timeDuration;

        foreach ($events as $res) {    
            $timeStart[] = $res->event_startTime;
            $timeDuration[] =  $res->event_duration;
            
        }
        for ($i=0; $i <sizeof($timeStart); $i++) { 
            $a[$i] = "+".$timeDuration[$i]." minutes";
            $a[$i] = strtotime($a[$i], strtotime($timeStart[$i]));
            $b[$i] = date('H:i:s', $a[$i]);
            $c[$i] = date('H:i:s', strtotime($timeStart[$i]));
            $c[$i] = date("h:i:s A",strtotime($c[$i]) );
            $b[$i] = date("h:i:s A",strtotime($b[$i]) );

            $timeSlots[$i] = $c[$i]. " - ".$b[$i];
        }
        
        foreach ($timeSlots as $key => $value) {

            $a=explode(" -",$value);
            $f=date("H:i:s", strtotime($a[0]));

            

            $d = DB::table('events as e')
                    ->orderBy('event_startTime', 'asc')
                    ->where('event_startTime',$f)
                    ->where('event_date',$date)
                    ->whereNull('deleted_at')
                    ->select()
                    ->get();

           
            $response[] = array(
                    
                    'timeslots' => $value,
                    'events' => $d
            );
        }

        return response()->json([
                    'status'    =>  'OK',
                    'message'   =>  'success',
                    'response'  =>  $response
                ]);
    }

    public function eventDay3(Request $request){
        
        // $eventDay3 = "2019-03-03";      //yy-mm-dd

        $date = Config::get('constants.event.day3');

        $events = Events::orderby('event_date','asc')
                    ->orderBy('event_startTime', 'asc')
                    ->where('event_date',$date)
                    ->whereNull('deleted_at')
                    ->select()
                    ->get();
        $timeStart; $timeEnd; $endTime; $timeSlots; $a; $b; $timeDuration;

        if(sizeof($events)==0){

            return response()->json([
                    'status'    =>  'OK',
                    'message'   =>  'success',
                    'response'  =>  []
                ]);
        }

        foreach ($events as $res) {    
            $timeStart[] = $res->event_startTime;
            $timeDuration[] =  $res->event_duration;
            
        }
        for ($i=0; $i <sizeof($timeStart); $i++) { 
            $a[$i] = "+".$timeDuration[$i]." minutes";
            $a[$i] = strtotime($a[$i], strtotime($timeStart[$i]));
            $b[$i] = date('H:i:s', $a[$i]);
            $c[$i] = date('H:i:s', strtotime($timeStart[$i]));
            $c[$i] = date("h:i:s A",strtotime($c[$i]) );
            $b[$i] = date("h:i:s A",strtotime($b[$i]) );

            $timeSlots[$i] = $c[$i]. " - ".$b[$i];
        }
        
        foreach ($timeSlots as $key => $value) {

            $a=explode(" -",$value);
            $f=date("H:i:s", strtotime($a[0]));

            

            $d = DB::table('events as e')
                    ->orderBy('event_startTime', 'asc')
                    ->where('event_startTime',$f)
                    ->where('event_date',$date)
                    ->whereNull('deleted_at')
                    ->select()
                    ->get();

            $response[] = array(
                    
                    'timeslots' => $value,
                    'events' => $d
            );
        }

        return response()->json([
                    'status'    =>  'OK',
                    'message'   =>  'success',
                    'response'  =>  $response
                ]);
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
        //
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
