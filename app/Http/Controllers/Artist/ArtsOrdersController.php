<?php

namespace App\Http\Controllers\Artist;

use App\Orders;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
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

    /**
     * Retrieve all Completed and Ongoing orders and send it to the view.
     *
     * @author Sinthujan G.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ViewAOrders()
    {
        $order = Orders::all();
        $event = DB::table('orders')
            ->join('users','users.email','=','orders.custID')
            ->select('users.*','orders.DueDate AS start','orders.DueDate AS end','orders.ordID AS id','orders.ordDate','DueDate AS chkDate','orders.status AS title')
            ->get();
        $calendar = $this->ViewCal($event);
        return view('pages/Artist/artOrders')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * Retrieve all Completed orders and send it to the view.
     *
     * @author Sinthujan G.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ViewCOrders()
    {
        $order = Orders::where('status','=','Completed')->get();
        $event = DB::table('orders')
            ->join('users','users.email','=','orders.custID')
            ->select('users.*','orders.DueDate AS start','orders.DueDate AS end','orders.ordID AS id','orders.ordDate','DueDate AS chkDate','orders.status AS title')
            ->get();
        $calendar = $this->ViewCal($event);
        return view('pages/Artist/artOrders')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * Retrieve all ongoing orders and send it to the view.
     *
     * @author Sinthujan G.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ViewOOrders()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        $event = DB::table('orders')
            ->join('users','users.email','=','orders.custID')
            ->select('users.*','orders.DueDate AS start','orders.DueDate AS end','orders.ordID AS id','orders.ordDate','DueDate AS chkDate','orders.status AS title')
            ->get();
        $calendar = $this->ViewCal($event);
        return view('pages/Artist/artOrders')->with('order',$order)->with('calendar',$calendar);
    }

    /**
     * Returns view with Calendar object and order details for deadline assignment.
     *
     * @author Sinthujan G.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ViewOOrdersDD()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        $event = DB::table('orders')
            ->join('users','users.email','=','orders.custID')
            ->select('users.*','orders.DLineDate AS start','orders.DLineDate AS end','orders.ordID AS id','orders.ordDate','DueDate AS chkDate','orders.status AS title')
            ->get();
        $calendar = $this->ViewCal($event);
        return view('pages/Artist/artOrdersAsDate')->with('order',$order)->with('calendar',$calendar);
    }


    /**
     * Returns calendar object based on the event object passed.
     * @param $event
     * @return mixed
     */
    public function ViewCal($event)
    {
        $events = array();
        foreach ($event as $eve) {
            $itemDets = DB::table('items')
                        ->join('itemorders','itemorders.itID','=','items.itID')
                        ->join('orders','orders.ordID','=','itemorders.ordID')
                        ->select('items.*','itemorders.qty')
                        ->where('itemorders.ordID','=',$eve->id)
                        ->get();
            if($eve->title == 'Completed')
                $color='#00a65a';
                elseif(Carbon::today()->subDay()->gte(Carbon::parse($eve->chkDate)) AND $eve->title == 'Ongoing')
                    $color = '#f39c12';
                    else {
                        if (Carbon::today()->addDays(2)->eq(Carbon::parse($eve->chkDate)) OR Carbon::today()->addDays(1)->eq(Carbon::parse($eve->chkDate))
                            OR Carbon::today()->eq(Carbon::parse($eve->chkDate))) {
                            $color = '#f56954';
                        }
                        else
                            $color = '#00c0ef';
                    }
            $name = $eve->name." ".$eve->lname;
            $events[] = Calendar::event(
                "Order ID:-".$eve->id,
                1,
                $eve->start,
                $eve->end,
                $eve->id,
                $color,
                '',
                "<script>
                    $(\"#itOrdersTab\").DataTable();
                    $(\"#getOrdModBtn\").html(\"<button type=button class='btn btn-danger pull-left' onclick=document.location.href='/viewOrDets=$eve->id'>Get more Details</button>\");
                 </script>
                <div class=\"tabbable\">
                    <ul class=\"nav nav-tabs\">
                    <li class=\"active\"><a href=\"#tab1\" data-toggle=\"tab\"><span style=\"color:black\">Customer Details</span></a></li>
                    <li><a href=\"#tab2\" data-toggle=\"tab\"><span style=\"color:black\">Order Details</span></a></li>
                    </ul>
                    <div class=\"tab-content\">
                        <div class=\"tab-pane active\" id=\"tab1\">
                          <label for='ordID'>Customer Name</label>
                          <input type='text' class='form-control' readonly value=\"$name\">
                          <label for='ordID'>Email</label>
                          <a href=\"#emailOrd\" style=\"border-style:solid;border-color:#EBEBE4;background-color:#EBEBE4;\" class='form-control' data-toggle=\"modal\"><i class=\"fa fa-envelope\"></i> &nbsp;&nbsp;$eve->email</a>
                          <label for='ordID'>Phone Number</label>
                          <input type='text' class='form-control' readonly value=\"$eve->PhoneNo\">
                          <label for='ordID'>Ordered Date</label>
                          <input type='text' class='form-control' readonly value=\"$eve->ordDate\">
                          <label for='ordID'>Due Date</label>
                          <input type='text' class='form-control' readonly value=\"$eve->chkDate\">
                        </div>
                        <div class=\"tab-pane\" id=\"tab2\">
                            <table  class=\"table table-condensed table-hover table-bordered\" id=\"itOrdersTab\">
                                <thead>
                                <tr>
                                    <th class=\"col-md-2 text-center\">
                                        Item Name
                                    </th>
                                    <th class=\"col-md-2 text-center\">
                                        Item Description
                                    </th>
                                    <th class=\"col-md-2 text-center\">
                                        Item Size
                                    </th>
                                    <th class=\"col-md-2 text-center\">
                                        Quantity
                                    </th>
                                    <th class=\"col-md-2 text-center\">
                                        Price per Unit
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                ".$this->printArr($itemDets)."
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>"
            );
        }
        $calendar = \Calendar::addEvents($events)
            ->setOptions([
            'firstDay' => 1])
            ->setCallbacks([
                'eventRender' =>'function(event, element){element.attr(\'href\', \'javascript:void(0);\');}',
                'eventClick' => 'function(event, jsEvent, view) {
                        $(\'#modalTitle\').html(event.title);
                        $(\'#modalBody\').html(event.description);
                        $(\'#eventUrl\').attr(\'href\',event.url);
                        $(\'#fullCalModal\').modal();
                }'
            ]);

        return $calendar;
    }

    /**
     * Assigns item details to a variable and returns to concatenate with the Calendar's modal content.
     *
     * @author Sinthujan G.
     * @param $itArr
     * @return string
     */
    public function printArr($itArr)
    {
        $value="";
        foreach($itArr as $itd)
        {
            $value .= "<tr class = \"warning\">
                        <td class=\"col-md-2 text-center\">
                            $itd->itName
                        </td>
                        <td class=\"col-md-2 text-center\">
                            $itd->itDescrip
                        </td>
                        <td class=\"col-md-2 text-center\">
                            $itd->itSize
                        </td>
                        <td class=\"col-md-2 text-center\">
                            $itd->qty
                        </td>
                        <td class=\"col-md-2 text-center\">
                            $itd->itPrice
                        </td>
                    </tr>";
        }
        return $value;
    }

    /**
     * Updates the order status to completed.
     *
     * @author Sinthujan G.
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
     * Update the deadline date for an order.
     *
     * @author Sinthujan G.
     * @return mixed
     */
    public function UpOrdDD()
    {

        $dets = array('orderID' => Request::input('ordID'),'deadline' =>Request::input('ddMask'));
        $ordD = DB::table('orders')->select('DueDate')->where('ordID','=',$dets['orderID'])->first();

        $messages = [
                'after' => 'The deadline must be a date after today or today.'
        ];
        $rules = array('orderID' => 'required','deadline' => 'required|date_format:Y-m-d|after:today|before:'.$ordD->DueDate);
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules,$messages);
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

    /**
     * Retrieve all details connected to the order to show in the view. Get order ID as parameter.
     *
     * @author Sinthujan G.
     * @param $ordID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewDets($ordID)
    {
        $ordDetails = DB::table('orders')
            ->join('users','users.email','=','orders.custID')
            ->leftjoin('payments','payments.pID','=','orders.payID')
            ->select('users.*','orders.*','payments.*')
            ->where('orders.ordID','=',$ordID)
            ->first();
        $delDetails = DB::table('customerdetails')
            ->join('orders','orders.delID','=','customerdetails.cusID')
            ->where('orders.ordID','=',$ordID)
            ->first();
        $itemDetails = DB::table('items')
            ->join('itemorders','itemorders.itID','=','items.itID')
            ->where('ordID','=',$ordID)
            ->get();
        $paymentDetails = DB::table('payments')
            ->join('orders','orders.payID','=','payments.pID')
            ->where('orders.ordID','=',$ordID)
            ->select('payments.*')
            ->first();

        return view('pages/Artist/artCOrderDetails',compact('ordDetails','delDetails','itemDetails','paymentDetails'));
    }
}