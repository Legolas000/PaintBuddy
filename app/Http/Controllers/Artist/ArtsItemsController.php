<?php

namespace App\Http\Controllers\Artist;

use App\Categories;
use App\Items;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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

    /**
     * Return Categories and Active items to the view
     *
     * @author Sinthujan G.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Returns view and required data.
     */
    public function loadDets()
    {
        $cats = DB::table('categories')->lists('catName','catID');
        $items = DB::table('items')
                ->join('categories','items.catRef','=','categories.catID')
                ->select('items.*','categories.catName AS catRef')
                ->where('status','AC')->get();
        return view('pages.Artist.artTemplates')->with('cats',$cats)->with('items',$items);
    }

    /**
     * Add items to the database and the images to 'img/tempEng' directory.
     *
     * @author Sinthujan G.
     * @return mixed Redirects to view with Success or Error messages.
     */
    public function addItems()
    {
        $dets = array('catName' => Request::input('cat_Name'),'image' => Request::file('image'),'name' => Request::input('iName'),'description' => Request::input('iDescrip'), 'size' => Request::input('iSize'), 'price' => Request::input('iPrice'));

        //setting up rules
        $rules = array('image' => 'required|mimes:jpeg,bmp,png','name' => 'required',
            'description' => 'required','size' => 'required', 'price' => 'required|numeric');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('aitem')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Request::file('image')->isValid()) {
                $destinationPath = 'img/tempEng';
                $extension = Request::file('image')->getClientOriginalExtension();
                $fileName = rand(11111,99999).Carbon::now()->format('Y-m-d').'.'.$extension;
                Request::file('image')->move($destinationPath, $fileName);
                $res = DB::table('items')->insertGetId(
                    ['itName' => $dets['name'], 'itDescrip' => $dets['description'],'imName'=>$fileName,'itSize' => $dets['size'],'catRef'=>$dets['catName'],'price'=>$dets['price'],'status' =>'AC']
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
     * Updates the item status, Changes it from Active to Non Active on the DB.
     *
     * @author Sinthujan G.
     * @param $itID
     * @return mixed    Redirects to the view with Error or Success messages.
     */
    public function chItemStatus($itID)
    {
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
     * Update details for the item.
     *
     * @author Sinthujan G.
     * @return mixed    Redirects to view with Error or Success messages.
     */
    public function upPrices()
    {
        $dets = array('itName' => Request::input('iName'),'itDescrip' =>Request::input('iDescrip'), 'itPrice' => Request::input('iPrice'));
        $rules = array('itName' => 'required','itDescrip' => 'required','itPrice' => 'required|numeric');
        $messages = array('itName.required' => 'The item name is required.','itDescrip.required' => 'The item description is required.','itPrice.required' =>'The item price is required.'
        ,'itPrice.numeric' => 'The item price must be numeric.');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('aitem')->withInput()->withErrors($validator);
        }
        else {
            $itID = DB::table('items')->select('itID')->where('itName','=',$dets['itName'])->first();
            $chkList = DB::table('itemorders')
                ->join('orders','orders.ordID','=','itemorders.ordID')
                ->join('users','orders.custID','=','users.email')
                ->where('itemorders.itID','=',$itID->itID)->where('orders.status','=','Ongoing')
                ->count();
            if($chkList>0)
            {
                return Redirect::to('aitem')->withInput()->withErrors("This item is currently in order. Please update after the order has been completed.");
            }
            else
            {
                $res = Items::where('itName','=',$dets['itName']);
                $res->update($dets);
            }
            if (!$res)
                App::abort(500, 'Some Error');

            return Redirect::to('aitem')->with('success', true)->with('message','Item sucessfully updated');
        }
    }

}
