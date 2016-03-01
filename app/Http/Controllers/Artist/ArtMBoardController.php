<?php

namespace App\Http\Controllers\Artist;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArtMBoardController extends Controller
{
    //
    public function viewPage()
    {
        $detsArr = array();
        $detsArr['usrCount'] = DB::table('users')->count();
        $detsArr['OnOrdCount'] = DB::table('orders')->where('status','=','Ongoing')->count();
        $detsArr['uniVisitors'] = DB::table('kryptonit3_counter_page_visitor')->count(DB::raw('DISTINCT visitor_id'));
        $detsArr['itemCount'] = DB::table('items')->where('status','=','AC')->count();
        return view('pages.Artist.artDashBoard')->with('detsArr',$detsArr);
    }
}
