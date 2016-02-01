<?php

namespace App\Http\Controllers\Artist;

use App\EventModel;
use App\Orders;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use MaddHatter\LaravelFullcalendar\Calendar;
use Illuminate\Support\Facades\Request;

/**
 * Class ArtsOrdersController
 * @package App\Http\Controllers\Artist
 */
class ArtsOrdersController extends Controller
{
    //

    /**
     * @return $this
     */
    public function ViewAOrders()
    {
        $order = Orders::all();
        return view('pages/Artist/artOrders')->with('order',$order);
    }

    /**
     * @return $this
     */
    public function ViewCOrders()
    {
        $order = Orders::where('status','=','Completed')->get();
        return view('pages/Artist/artOrders')->with('order',$order);
    }

    /**
     * @return $this
     */
    public function ViewOOrders()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        return view('pages/Artist/artOrders')->with('order',$order);
    }

    /**
     * @return $this
     */
    public function ViewOOrdersDD()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        return view('pages/Artist/artOrdersAsDate')->with('order',$order);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ViewCal()
    {
        $event = EventModel::all();

        foreach ($event as $eve) {
            $events[] = Calendar::event(
                $eve->title, //event title
                $eve->allDay, //full day event?
                $eve->start, //start time
                $eve->end, //end time
                $eve->id, //optionally, you can specify an event ID
                $eve->color
            );
        }

        $eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events) //add an array with addEvents
//        ->addEvent($eloquentEvent, [ //set custom color fo this event
//            'color' => '#800',
//        ])
            ->setOptions([ //set fullcalendar options
            'firstDay' => 1]);

        return view('\pages/Artist/ordCalendar', compact('calendar'));
    }

    /**
     * @param $ordID
     * @return mixed
     */
    public function UpdOrderStat($ordID)
    {
        $res = Orders::where('ordID',$ordID)
            ->update(['status' => 'Completed']);
        if(!$res)
            App::abort(500, 'Some Error');

        return Redirect::to('/ArtMainOrders')->with('success', true)->with('message','Order sucessfully completed');
    }

    /**
     * @return mixed
     */
    public function UpOrdDD()
    {

        $dets = array('orderID' => Request::input('ordID'),'deadline' =>Request::input('ddMask'));

        //setting up rules
        $rules = array('orderID' => 'required','deadline' => 'required');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('ArtAsDead')->withInput()->withErrors($validator);
        }
        else {

            $res = Orders::where('ordID', $dets['orderID'])
                ->update(['DLineDate' => $dets['deadline']]);
//            if (!$res)                                    MySQL ignores if same data is sent for update : resolve by writing a class and use this.
//                App::abort(500, 'Some Error');
            return Redirect::to('ArtAsDead')->with('success', true)->with('message','Date successfully assigned');
        }
    }



}
