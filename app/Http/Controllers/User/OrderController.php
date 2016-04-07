<?php

namespace App\Http\Controllers\User;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use PDF;
use View;
//use Mail;
//use App\User;
use Auth;
use App\Items;
use App\Reviews;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateRegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class
OrderController extends Controller
{
    /**
     * @author mayura
     * get the orders that user gave, from db and load that in a page
     * @return $this
     */
    public function getOrder() {

        $results = DB::table('orders')
           // ->join('orders', 'itemorders.ordID', '=', 'orders.ordID')
            ->select('ordID', 'ordDate', 'DueDate',  'orders.status')
            ->orWhere(function($query) {
                $query->where('custID', '=', Auth::user()->email);
            })
            //->distinct()
            ->get();
        return view('pages/User/login/customer_order')->with('results', $results);

    }

    /**
     * @author mayura
     * load the details of a perticular order
     * @param $id
     * @return $this
     */
    public function myorderView( $id) {

        $results = DB::table('itemorders')
            ->join('items', 'itemorders.itID', '=', 'items.itID')
            ->join('orders', 'itemorders.ordID', '=', 'orders.ordID')
            ->select('items.itID', 'items.itName', 'items.itDescrip', 'items.price', 'orders.ordID', 'orders.status', 'orders.ordDate', 'itemorders.qty', 'orders.DueDate')
            ->where('orders.ordID', '=', $id)
            ->get();

        return view('pages/User/login/customer_orderView')->with('results', $results);
       // return view('print')->with('results', $results);
    }


    /**
     * @auther mayura
     * getting items that user had used
     * @return $this
     */
    public function get_item_list() {

//        return Auth::user()->email;
        $results = DB::table('itemorders')
            ->join('items', 'itemorders.itID', '=', 'items.itID')
            ->join('orders', 'itemorders.ordID', '=', 'orders.ordID')
            ->where('orders.custID', '=', Auth::user()->email)
            ->where('orders.status','=','Completed')
            ->get();
//        return json_encode($results);

        return view('pages/User/login/list_items')->with('results', $results);
    }

    /**
     * @auther mayura
     * getting reviews for a particular used item
     * @param $itID
     * @return mixed
     */
    public function get_item_review($itID) {
       // $login_id=Input::get('login_id');
      // if(Auth::loginUsingId($login_id)) {

            $item = DB::table('items')
                ->where('itID', $itID)
                ->get();
            $reviews = DB::table('reviews')
                ->where('id', $itID)
                ->get();
//        return $item;
             return view('pages/User/login/item_review')->with('reviews', $reviews)->with('results', $item);
      // return redirect('item_review.'.$itID)->with('reviews', $reviews)->with('results', $item);
       // }
    }

    /**
     * @auther mayura
     * adding reviews to a particular used item
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add_item_review(){
        $login_id=Input::get('login_id');
       // if (Auth::loginUsingId($login_id)){
            $reviews = new Reviews();
            $reviews->id = Input::get('item_id');
            $reviews->email=Auth::user()->email;
            $reviews->comment = Input::get('comment');

            $count = DB::table('reviews')
                ->orWhere(function($query) {
                    $query->where('email', Auth::user()->email);
                })
                ->where('id', Input::get('item_id'))
                ->count();

            if($count==0){
                $reviews->save();
            }
            else{
                DB::table('reviews')
                    ->orWhere(function($query) {
                        $query->where('email', Auth::user()->email);
                    })
                    ->where('id', Input::get('item_id'))
                    ->update(['comment' =>  Input::get('comment')]);
            }

            return redirect('item_review.'.Input::get('item_id'));
       //
    }

    public function makePDF($id)
    {
       /* $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();*/

        $results = DB::table('itemorders')
            ->join('items', 'itemorders.itID', '=', 'items.itID')
            ->join('payments', 'itemorders.ordID', '=', 'payments.pID')
            ->join('orders', 'itemorders.ordID', '=', 'orders.ordID')
            ->select('items.itID', 'items.itName', 'items.imName','items.itDescrip', 'items.price', 'orders.ordID', 'orders.status', 'orders.ordDate', 'itemorders.qty', 'orders.DueDate')
            ->where('orders.ordID', '=', $id)
            ->get();

       

//echo $parameter[0][3];
     //  return $results;
       
        /*$parameter = array();
        $parameter['param'] = "Hello World!!";

        $pdf = PDF::loadView('print',$parameter);
        return $pdf->stream();*/
      //return  $results["itID"];
        $pdf = PDF::loadView('pages.User.print', compact('results'))->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream();
    }
}
