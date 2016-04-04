<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Kryptonit3\Counter\Counter;
use Kryptonit3\Counter\Facades\CounterFacade;

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
    public function viewCatDets($catName)
    {
        $imDets = DB::select(DB::raw("SELECT * FROM items WHERE catRef = (SELECT catID FROM categories WHERE catName ='$catName')"));
        return view('pages/Main/categoryView')->with('imDets',$imDets);
    }

    public function viewItDets($itemID)
    {
        $itDets = DB::table('items')
                    ->join('categories','items.catRef','=','categories.catID')
                    ->where('items.itID','=',$itemID)
                    ->first();
        CounterFacade::Count('ViewItDets',$itemID);
        return view('pages/Main/viewItemDets')->with('itDets',$itDets);
    }
}
