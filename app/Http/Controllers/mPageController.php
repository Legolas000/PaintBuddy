<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class mPageController
 * @package App\Http\Controllers
 */
class mPageController extends Controller
{
    //Main page controller included here.

    /**
     * @return $this
     */
    public function viewImages()
    {
        $imDets = Items::where('status','AC')->get();
        return view('pages/home')->with('imDets',$imDets);
    }
}
