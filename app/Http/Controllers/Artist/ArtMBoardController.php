<?php

namespace App\Http\Controllers\Artist;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ArtMBoardController extends Controller
{
    public static function getRData()
    {
        $dDateArr = array();
        $event = DB::table('orders')
            ->join('users','users.email','=','orders.custID')
            ->select('users.*','orders.DueDate AS chkDate','orders.ordID AS id','orders.ordDate','DueDate AS chkDate','orders.status AS status')
            ->get();
        foreach($event as $eve) {
            if (Carbon::today()->addDays(2)->eq(Carbon::parse($eve->chkDate)) OR Carbon::today()->addDays(1)->eq(Carbon::parse($eve->chkDate))
                OR Carbon::today()->eq(Carbon::parse($eve->chkDate))) {
                $dDateArr[]['dLineIDs'] = $eve->id;
            }
            elseif(Carbon::today()->subDay()->gte(Carbon::parse($eve->chkDate)) AND $eve->status == 'Ongoing')
            {
                $dDateArr[]['passIDs'] = $eve->id;
            }
        }
        View::share('dDateArr',$dDateArr);
    }
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
