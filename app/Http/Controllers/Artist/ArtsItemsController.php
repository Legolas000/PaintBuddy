<?php

namespace App\Http\Controllers\Artist;

use App\Categories;
use App\Items;
use Carbon\Carbon;
use Faker\Provider\zh_TW\DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Validator;
use Redirect;
use Session;

/**
 * Class ArtsItemsController
 * @package App\Http\Controllers\Artist
 */
class ArtsItemsController extends Controller
{
    //

    /**
     * @return mixed
     */
    public function loadDets()
    {
//        $cats = DB::table('categories')->lists('catID','catName')->get();
//        $cats = Categories::list('catID','catName');
        $cats = DB::table('categories')->lists('catName','catID');
        $items = DB::table('items')
                ->join('categories','items.catRef','=','categories.catID')
                ->select('items.*','categories.catName AS catRef')
                ->where('status','AC')->get();
        //return $items;
        return view('pages.Artist.artTemplates')->with('cats',$cats)->with('items',$items);
    }

    /**
     * @return mixed
     */
    public function addItems() {
        // getting all of the post data
        $dets = array('catName' => Request::input('cat_Name'),'image' => Request::file('image'),'name' => Request::input('iName'),'description' => Request::input('iDescrip'), 'size' => Request::input('iSize'), 'price' => Request::input('iPrice'));
//        return $dets;
//        if (Request::hasFile('image'))
//        {
//            $file = Request::file('image');
//            return 'got photo';
//            //and do this
//        }
       // return $dets;

         //setting up rules
        $rules = array('image' => 'required','name' => 'required',
            'description' => 'required','size' => 'required', 'price' => 'required|numeric'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('aitem')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Request::file('image')->isValid()) {
                $destinationPath = 'img/tempEng'; // upload path
                $extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).Carbon::now()->format('Y-m-d').'.'.$extension; // renameing image
                Request::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $res = DB::table('items')->insertGetId(
                    ['itName' => $dets['name'], 'itDescrip' => $dets['description'],'imName'=>$fileName,'itSize' => $dets['size'],'catRef'=>$dets['catName'],'itPrice'=>$dets['price'],'status' =>'AC']
                );
                if(!$res)
                    App::abort(500, 'Some Error');

                return Redirect::to('aitem')->with('success', true)->with('message','Item successfully added');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                App::abort(500, 'Error');
            }
        }
    }


    /**
     * @param $itID
     * @return mixed
     */
    public function chItemStatus($itID){
        //return $itID;
        $ValItem = DB::table('itemorders')
            ->join('orders','orders.ordID','=','itemorders.ordID')
            ->where('orders.status','=','Ongoing')
            ->where('itemorders.itID','=',$itID)
            ->count();
        if($ValItem == 0) {
            $res = DB::table('items')->where('itID', $itID)
                ->update(['status' => 'NA']);
            if (!$res)
                App::abort(500, 'Some Error');

            return Redirect::to('/aitem')->with('success', true)->with('message', 'Item sucessfully removed');
        }
        else
            return Redirect::to('/aitem')->withInput()->withErrors("Item has been ordered.Please remove after completion of the order");
    }

    /**
     * @return mixed
     */
    public function upPrices()
    {
        $dets = array('itName' => Request::input('iName'),'itDescrip' =>Request::input('iDescrip'), 'itPrice' => Request::input('iPrice'));

        $rules = array('itName' => 'required','itDescrip' => 'required','itPrice' => 'required|numeric');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('aitem')->withInput()->withErrors($validator);
        }
        else {
            $res = Items::where('itName','=',$dets['itName']);
            $res->update($dets);
            $itID = DB::table('items')->select('itID')->where('itName','=',$dets['itName'])->first();
            //return json_encode($itID);
            $EmailList = DB::table('itemorders')
                ->join('orders','orders.ordID','=','itemorders.ordID')
                ->join('users','orders.custID','=','users.email')
                ->where('itemorders.itID','=',$itID->itID)->where('orders.status','=','Ongoing')
                ->select('users.email')
                ->get();
            if(count($EmailList)>0)
            {
                $TrimEmailList = array();
                foreach ($EmailList as $email) {
                    $TrimEmailList[] = $email->email;
                }
                // return json_encode($PreferEmailList);
                //return json_encode($EmailList);
                // return json_encode($dets);
                $data = array(
                    'name' => "Artist",
                    'itemName' => $dets['itName'],
                    'price' => $dets['itPrice'],
                );

                Mail::send('pages.Artist.MailPages.Mail1', $data, function ($message) use ($TrimEmailList) {

                    $message->from('paintbuddyProj@gmail.com', 'PaintBuddy Team');

                    $message->to($TrimEmailList)->subject('Change in Price');

                });
            }
            if (!$res)
                App::abort(500, 'Some Error');
            return Redirect::to('aitem')->with('success', true)->with('message','Item sucessfully updated');
        }
    }


}
