<?php

namespace App\Http\Controllers\Artist;

use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\EventModel;
use MaddHatter\LaravelFullcalendar\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
class ArtsController extends Controller
{
    //
    public function ViewAOrders()
    {
        $order = Orders::all();
        return view('pages/Artist/artOrders')->with('order',$order);
        //return 'hello';
    }

    public function ViewCOrders()
    {
        $order = Orders::where('status','=','Completed')->get();
        return view('pages/Artist/artOrders')->with('order',$order);
    }

    public function ViewOOrders()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        return view('pages/Artist/artOrders')->with('order',$order);
    }

    public function ViewCal()
    {
        $event = EventModel::all();

        foreach ($event as $eve) {
            $events[] = \MaddHatter\LaravelFullcalendar\Calendar::event(
                $eve->title, //event title
                $eve->allDay, //full day event?
                $eve->start, //start time (you can also use Carbon instead of DateTime)
                $eve->end, //end time (you can also use Carbon instead of DateTime)
                $eve->id //optionally, you can specify an event ID
            );
        }

        $eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events) //add an array with addEvents
        ->addEvent($eloquentEvent, [ //set custom color fo this event
            'color' => '#800',
        ])->setOptions([ //set fullcalendar options
            'firstDay' => 1]);
//        ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
//            'viewRender' => 'function() {alert("Callbacks!");}'
//        ]);
        $test='hello';
        return view('\pages/Artist/ordCalendar', compact('calendar'));
    }

    public function UpdOrderStat($ordID)
    {
        Orders::where('ordID',$ordID)
            ->update(['status' => 'Completed']);
        return Redirect::to('/ArtMainOrders');
    }
}
