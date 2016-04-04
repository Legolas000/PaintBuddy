<?php

namespace App\Http\Controllers\Artist;

use App\Categories;
use App\Items;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        return view('pages.Artist.artItemsView')->with('cats',$cats)->with('items',$items);
    }

    /**
     * Add items to the database and the images to 'img/tempEng' directory.
     *
     * @author Sinthujan G.
     * @return mixed Redirects to view with Success or Error messages.
     */
    public function addItems()
    {
        $dets = array('catName' => Request::input('cat_Name'),'image' => Request::file('image'),'name' => Request::input('iName'),'description' => Request::input('iDescrip'), 'size' => Request::input('iSize'), 'avStk' => Request::input('aiStk'), 'price' => Request::input('iPrice'));

        //setting up rules
        $rules = array('image' => 'required|mimes:jpeg,bmp,png','name' => 'required',
            'description' => 'required','size' => 'required', 'avStk' => 'required|numeric|min:1', 'price' => 'required|numeric|min:200');
        $messages = array('avStk.min' => 'The available stock must be a minimum of 1');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules, $messages);
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
                    ['itName' => $dets['name'], 'itDescrip' => $dets['description'], 'imName' => $fileName, 'itSize' => $dets['size'], 'avqty' => $dets['avStk'], 'catRef' => $dets['catName'],'itPrice' => $dets['price'],'status' => 'AC']
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
            //Add file deletion after completion during presentation.
//            $val= DB::table('items')->where('itID','=',$itID)->select('imName')->first();
//            $file_path = public_path("img/tempEng/".$val->imName);
//            if(File::exists($file_path))
//                File::delete($file_path);
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
        $dets = array('itName' => Request::input('iName'),'itDescrip' =>Request::input('iDescrip'), 'itPrice' => Request::input('iPrice'), 'uiStk' => Request::input('uiStk'));
        $rules = array('itName' => 'required','itDescrip' => 'required','itPrice' => 'required|numeric|min:200', 'uiStk' => 'numeric');
        $messages = array('itName.required' => 'The item name is required.','itDescrip.required' => 'The item description is required.','itPrice.required' =>'The item price is required.'
        ,'itPrice.numeric' => 'The item price must be numeric.');
        $prStk = DB::table('items')
            ->where('itName','=',$dets['itName'])
            ->select('avqty')->first();
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

            if(($prStk->avqty == 0 && $dets['uiStk'] < 0) OR (($prStk->avqty + $dets['uiStk'])< 0))
                return Redirect::to('aitem')->withInput()->withErrors("The entered value is below available stock. Please restock.");

            if($chkList>0)
            {
                return Redirect::to('aitem')->withInput()->withErrors("This item is currently in order. Please update after the order has been completed.");
            }
            else
            {
                $res = Items::where('itName','=',$dets['itName']);
                $res->update(['itDescrip' => $dets['itDescrip']]);
                $res->update(['itPrice' => $dets['itPrice']]);
                if($dets['uiStk'] != null)
                    $res->increment('avqty',$dets['uiStk']);
            }
            if (!$res)
                App::abort(500, 'Some Error');

            return Redirect::to('aitem')->with('success', true)->with('message','Item sucessfully updated');
        }
    }

}
