<?php

namespace App\Http\Controllers\Artist;

use App\EventModel;
use App\Orders;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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
        $calendar = $this->ViewOrCal();
        return view('pages/Artist/artOrders')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * @return $this
     */
    public function ViewCOrders()
    {
        $order = Orders::where('status','=','Completed')->get();
        $calendar = $this->ViewOrCal();
        return view('pages/Artist/artOrders')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * @return $this
     */
    public function ViewOOrders()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        $calendar = $this->ViewOrCal();
        return view('pages/Artist/artOrders')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * @return $this
     */
    public function ViewCusRatOrd()
    {
        //$order = DB::select(DB::raw('SELECT * FROM orders O, itemorders io ,register r WHERE o.ordID = io.ordID AND io.custID = r.UserName ORDER BY r.UsrRating DESC'));
        $order = Orders::join('itemorders','itemorders.ordID','=','orders.ordID')
                        ->join('register','register.UserName','=','itemorders.custID')
                        ->where('orders.status','=','Ongoing')
                        ->orderby('register.UsrRating','DESC')->get();
        //return $order;
        $calendar = $this->ViewOrCal();
        return view('pages/Artist/artOrders')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * @return $this
     */
    public function ViewOOrdersDD()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        $calendar = $this->ViewDCal();
        return view('pages/Artist/artOrdersAsDate')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ViewDCal()
    {
        //$event = EventModel::all();
        //$event = DB::table('event_models')->get();

        //$eventCol = DB::select('SELECT DueDate AS \'start\',DueDate AS \'end\', ordID AS \'id\', status AS \'title\' FROM orders');
        $event = DB::select('SELECT DLineDate AS \'start\',DLineDate AS \'end\',DueDate AS \'chkDate\', ordID AS \'id\',ordDate , status AS \'title\' FROM orders');
        $events = array();
        foreach ($event as $eve) {
            //return $eve->start;
            //return Carbon::today()->addDays(2);
            if($eve->title == 'Completed')
                $color='#00a65a';
                elseif(Carbon::today()->subDay()->gte(Carbon::parse($eve->chkDate)) AND $eve->title == 'Ongoing')
                    $color = '#f39c12';
                    else {
                        if (Carbon::today()->addDays(2)->eq(Carbon::parse($eve->chkDate)) OR Carbon::today()->addDays(1)->eq(Carbon::parse($eve->chkDate))
                            OR Carbon::today()->eq(Carbon::parse($eve->chkDate))) {
                            $color = '#f56954';
                            //$color='#800';
                        }
                        else
                            $color = '#00c0ef';
                    }
            $events[] = Calendar::event(
                "Order ID:-".$eve->id, //event title
                1, //full day event?
                $eve->start, //start time
                $eve->end, //end time
                $eve->id, //optionally, you can specify an event ID
                $color,
                'http://www.google.com',
                " <label for='ordID'>Ordered Date</label>
                  <input type='text' class='form-control' id='ordID' name='ordID' readonly value=\"$eve->ordDate\">
                  <label for='ordID'>Due Date</label>
                  <input type='text' class='form-control' id='ordID' name='ordID' readonly value=\"$eve->chkDate\">"
            );
        }

       // $eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events) //add an array with addEvents
//        ->addEvent($eloquentEvent, [ //set custom color fo this event
//            'color' => '#800',
//        ])
            ->setOptions([ //set fullcalendar options
            'firstDay' => 1])
            ->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                'eventRender' =>'function(event, element){element.attr(\'href\', \'javascript:void(0);\');}',
                'eventClick' => 'function(event, jsEvent, view) {
                        $(\'#modalTitle\').html(event.title);
                        $(\'#modalBody\').html(event.description);
                        $(\'#eventUrl\').attr(\'href\',event.url);
                        $(\'#fullCalModal\').modal();
                }'
            ]);

        return $calendar;
        //return view('\pages/Artist/ordCalendar',compact('calendar'));
    }

    /**
     * @return mixed
     */
    public function ViewOrCal()
    {
        //$event = EventModel::all();
        //$event = DB::table('event_models')->get();


        $event = DB::select('SELECT DueDate AS \'start\',DueDate AS \'end\', ordID AS \'id\',ordDate , status AS \'title\' FROM orders');
        $events = array();
        foreach ($event as $eve) {
            //return $eve->start;
            //return Carbon::today()->addDays(2);
            if($eve->title == 'Completed')
                $color='#00a65a';
            elseif(Carbon::today()->subDay()->gte(Carbon::parse($eve->start)) AND $eve->title == 'Ongoing')
                $color = '#f39c12';
            else {
                if (Carbon::today()->addDays(2)->eq(Carbon::parse($eve->start)) OR Carbon::today()->addDays(1)->eq(Carbon::parse($eve->start))
                    OR Carbon::today()->eq(Carbon::parse($eve->start))) {
                    $color = '#f56954';
                    //$color='#800';
                }
                else
                    $color = '#00c0ef';
            }
            $events[] = Calendar::event(
                "Order ID:-".$eve->id, //event title
                1, //full day event?
                $eve->start, //start time
                $eve->end, //end time
                $eve->id, //optionally, you can specify an event ID
                $color,
                'http://www.google.com',
                " <label for='ordID'>Ordered Date</label>
                  <input type='text' class='form-control' id='ordID' name='ordID' readonly value=\"$eve->ordDate\">
                  <label for='ordID'>Due Date</label>
                  <input type='text' class='form-control' id='ordID' name='ordID' readonly value=\"$eve->start\">"
            );
        }

        // $eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events) //add an array with addEvents
//        ->addEvent($eloquentEvent, [ //set custom color fo this event
//            'color' => '#800',
//        ])
        ->setOptions([ //set fullcalendar options
            'firstDay' => 1,
            ])
            ->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                'eventRender' =>'function(event, element){element.attr(\'href\', \'javascript:void(0);\');}',
                'eventClick' => 'function(event, jsEvent, view) {
                        $(\'#modalTitle\').html(event.title);
                        $(\'#modalBody\').html(event.description);
                        $(\'#eventUrl\').attr(\'href\',event.url);
                        $(\'#fullCalModal\').modal();
                }'
            ]);

        return $calendar;
        //return view('\pages/Artist/ordCalendar',compact('calendar'));
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
        $ordD = DB::table('orders')->select('ordDate')->where('ordID','=',$dets['orderID'])->first();
       // $test= ;
         //return $ordDate;
        //var_dump($ordDate);
        //setting up rules
        $rules = array('orderID' => 'required','deadline' => 'required|date_format:Y-m-d|after:'.$ordD->ordDate);
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
