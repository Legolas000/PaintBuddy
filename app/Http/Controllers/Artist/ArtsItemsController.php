<?php

namespace App\Http\Controllers\Artist;

use App\Categories;
use App\Items;
use Carbon\Carbon;
use Faker\Provider\zh_TW\DateTime;
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
    //

    /**
     * @return mixed
     */
    public function loadDets()
    {
//        $cats = DB::table('categories')->lists('catID','catName')->get();
//        $cats = Categories::list('catID','catName');
        $cats = DB::table('categories')->lists('catName','catID');
        $items = DB::table('items')->where('status','AC')->get();
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
<<<<<<< HEAD
                $destinationPath = 'img/tempEng'; // upload path
=======
                $destinationPath = 'images/tempEng'; // upload path
>>>>>>> origin/master
                $extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).Carbon::now()->format('Y-m-d').'.'.$extension; // renameing image
                Request::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $res = DB::table('items')->insertGetId(
                    ['itName' => $dets['name'], 'itDescrip' => $dets['description'],'imPath'=>$fileName,'itSize' => $dets['size'],'catRef'=>$dets['catName'],'price'=>$dets['price'],'status' =>'AC']
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
        $res = DB::table('items')->where('itID',$itID)
            ->update(['status' => 'NA']);
        if(!$res)
            App::abort(500, 'Some Error');

        return Redirect::to('/aitem')->with('success', true)->with('message','Item sucessfully removed');
    }

    /**
     * @return mixed
     */
    public function upPrices()
    {
        $dets = array('itName' => Request::input('iName'),'itDescrip' =>Request::input('iDescrip'), 'price' => Request::input('iPrice'));

        $rules = array('itName' => 'required','itDescrip' => 'required','price' => 'required|numeric');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('aitem')->withInput()->withErrors($validator);
        }
        else {
            $res = Items::where('itName','=',$dets['itName']);
            $res->update($dets);
            if (!$res)
                App::abort(500, 'Some Error');
            return Redirect::to('aitem')->with('success', true)->with('message','Item sucessfully updated');
        }
    }


}
