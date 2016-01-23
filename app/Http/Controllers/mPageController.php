<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class mPageController extends Controller
{
    //Main page controller included here.

    public function viewImages()
    {
        $imDets = Items::all();
        return view('pages/home')->with('imDets',$imDets);
//        return $imDets;
//        //return 'hello';
//        $imDets = 'hello';
//        return view('pages/home')->with('imDets',$imDets);
    }
}
