<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events;
use App\Speakers;
use App\Sponsors;

use DB;

class EventController extends Controller
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

        return view('events');
    }

    public function show(Request $request, Events $events,Speakers $speakers,Sponsors $sponsors)
    {
       $events = DB::table('events as e')
                    ->leftJoin('speakers as speaker','speaker.id','e.event_speaker')
                    ->leftJoin('sponsors as sponsor','sponsor.id','e.event_sponsor')
                    ->whereNull('e.deleted_at')
                    ->orderBy('e.id', 'desc')
                    ->select('e.*','speaker.speaker_name','sponsor.sponsors_name')
                    ->get();

       /*   $events = $events->orderBy('id', 'desc')->take(10)->select()->get();
            $speakers = $speakers->whereNull('deleted_at')->select()->get();
            $sponsors = $sponsors->whereNull('deleted_at')->select()->get();
            $data['events']     = $events; $data['speakers']   = $speakers; $data['sponsors']   = $sponsors;
        */
        return response()->json($events);
    }

    public function store(Request $request,Events $event)
    { 
        $e = new Events();
        $e->event_name      = $request->get('event_name');
        $e->event_date      = $request->get('event_date');
        $e->event_startTime = $request->get('event_start_time');
        $e->event_duration  = $request->get('event_duration');
        $e->event_venue     = $request->get('event_venue');
        $e->event_speaker   = $request->get('speaker_id');
        $e->event_sponsor   = $request->get('sponsor_id');
        $e->event_topic     = $request->get('event_topic');
        $e->event_details   = $request->get('event_detail');
        $e->event_avatar    = $request->get('event_avatar');
        $e->event_lat       = '243.11';
        $e->event_long      = '243.11';
        $e->save();

       /* $response = DB::table('events')->insert([

            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'event_startTime' => $request->event_start_time,
            'event_duration' => $request->event_duration,
            'event_venue' => $request->event_venue,
            'event_speaker' => $request->speaker_id,
            'event_sponsor' => $request->sponsor_id,
            'event_topic' => $request->event_topic,
            'event_details' => $request->event_detail,
            'event_avatar' => $request->event_avatar,
            'event_lat' => "1231.1231",
            'event_long' => "2340.099"
        ]);*/
    

        return response()->json($e);
    }

    public function destroy(Request $request,$id){
        
        Events::findorFail($id)->delete();
        // return true;
    }
}