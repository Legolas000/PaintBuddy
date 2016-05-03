<?php

namespace App\Http\Controllers\Artist;


use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ArtsTempController extends Controller
{
    //
    //Get these two to one
    public function loadDesDets()
    {
        $tempCats = DB::table('ctempcats')->lists('tcatName','tcatID');
        $tempDets = DB::table('ctemplates')
                    ->where('status', '=', 'AC')
                    ->where('type', '=', 'Design')
                    ->get();
        return view('pages.Artist.artTempView')->with('cats',$tempCats)->with('items',$tempDets);
    }

    public function loadBacDets()
    {
        $tempCats = DB::table('ctempcats')->lists('tcatName','tcatID');
        $tempDets = DB::table('ctemplates')
            ->where('status', '=', 'AC')
            ->where('type', '=', 'Background')
            ->get();
        return view('pages.Artist.artTempView')->with('cats',$tempCats)->with('items',$tempDets);
    }

    public function addBack()
    {
//        'catName' => Request::input('cat_Name')
        $dets = array('name' => Request::input('iName'),'fileFront' => Request::file('fileFront'),'fileBack' => Request::file('fileBack'),'name' => Request::input('iName'),'description' => Request::input('iDescrip'), 'price' => Request::input('iPrice'));
        //return json_encode($dets);
        //setting up rules
        $rules = array('fileFront' => 'required|mimes:jpeg,bmp,png','fileBack' => 'required|mimes:jpeg,bmp,png','name' => 'required',
            'description' => 'required', 'price' => 'required|numeric|min:200');
        $messages = array('fileFront.required' => 'The front cover is required','fileBack.required' => 'The back cover is required');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('aTempBac')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Request::file('fileFront')->isValid() && Request::file('fileBack')->isValid()) {
                $destinationPath = 'img/cusTempEng/Background';
                $extension = Request::file('fileFront')->getClientOriginalExtension();
                $extension1 = Request::file('fileBack')->getClientOriginalExtension();
                $genFileName = rand(11111,99999).Carbon::now()->format('Y-m-d');
                $fileName = $genFileName.'-Front.'.$extension;
                $fileName1 = $genFileName.'-Back.'.$extension1;
                Request::file('fileFront')->move($destinationPath, $fileName);
                Request::file('fileBack')->move($destinationPath, $fileName1);
//                'catRef' => $dets['catName'],
                $res = DB::table('ctemplates')->insertGetId(
                    ['name' => $dets['name'], 'description' => $dets['description'], 'type' => 'Background', 'fileFront' => $fileName, 'fileBack' => $fileName1, 'description' => $dets['description'],'price' => $dets['price'], 'catRef' => null, 'status' => 'AC']
                );
                if(!$res)
                    App::abort(500, 'Some Error');

                return Redirect::to('aTempBac')->with('success', true)->with('message','Backgrounds successfully added');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                App::abort(500, 'Error');
            }
        }
    }

    public function addDesign()
    {
        $dets = array('catName' => Request::input('cat_Name'),'name' => Request::input('iName'),'fileDesign' => Request::file('fileDesign'),'name' => Request::input('iName'),'description' => Request::input('iDescrip'), 'price' => Request::input('iPrice'));
        //return json_encode($dets);
        //setting up rules
        $rules = array('fileDesign' => 'required|mimes:jpeg,bmp,png','name' => 'required',
            'description' => 'required', 'price' => 'required|numeric|min:200');
        $messages = array('fileDesign.required' => 'The design is required');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('aTempDes')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Request::file('fileDesign')->isValid()) {
                $destinationPath = 'img/cusTempEng/Designs';
                $extension = Request::file('fileDesign')->getClientOriginalExtension();
                $fileName = rand(11111,99999).Carbon::now()->format('Y-m-d').'-Design.'.$extension;
                Request::file('fileDesign')->move($destinationPath, $fileName);
                $res = DB::table('ctemplates')->insertGetId(
                    ['name' => $dets['name'], 'description' => $dets['description'], 'type' => 'Design', 'fileDesign' => $fileName, 'description' => $dets['description'],'price' => $dets['price'], 'catRef' => $dets['catName'],'status' => 'AC']
                );
                if(!$res)
                    App::abort(500, 'Some Error');

                return Redirect::to('aTempDes')->with('success', true)->with('message','Design successfully added');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                App::abort(500, 'Error');
            }
        }
    }

    public function upPrices()
    {
        $dets = array('iID' => Request::input('iID'), 'itDescrip' => Request::input('iDescrip'), 'itPrice' => Request::input('iPrice'));
        $rules = array('iID' => 'required', 'itDescrip' => 'required', 'itPrice' => 'required|numeric|min:100');
        $messages = array('iID.required' => 'The item name is required.', 'itDescrip.required' => 'The item description is required.', 'itPrice.required' => 'The item price is required.'
        , 'itPrice.numeric' => 'The item price must be numeric.');

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
//            return json_encode($dets);
            $res = DB::table('ctemplates')->where('id', '=', $dets['iID']);
            $res->update(['description' => $dets['itDescrip']]);
            $res->update(['price' => $dets['itPrice']]);
            if (!$res)
                App::abort(500, 'Some Error');

            return Redirect::back()->with('success', true)->with('message', 'Item sucessfully updated');
        }
    }


    public function chTempStatus($id)
    {
        //Check if it is order after completion of that. And removal of picture, check if background and design. Add $res and chk if changes done to DB
//        $val= DB::table('ctemplates')->where('id','=',$id)->select('imName')->first();
//        $file_path = public_path("img/tempEng/".$val->imName);
//        if(File::exists($file_path))
//            File::delete($file_path);
        $chkUsed = DB::table('itemorders')->where('itID' , '=', $id)->count();
        if($chkUsed == 0)
            DB::table('ctemplates')->where('id','=',$id)->delete();
        else {
            $res = DB::table('ctemplates')->where('id', $id)
                ->update(['status' => 'NA']);
            if (!$res)
                App::abort(500, 'Some Error');
        }
        return Redirect::back()->with('success', true)->with('message', 'Item sucessfully removed');
    }
}
