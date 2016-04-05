<?php

namespace App\Http\Controllers\Artist;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

/**
 * Class ArtMBoardController
 * @package App\Http\Controllers\Artist
 */
class ArtMBoardController extends Controller
{

    /**
     * This function retreives data to show on the notification bar.
     * As the variable is required through all the views, it is shared
     * using the View::share() function.
     *
     * @author Sinthujan G.
     * @return null
     */
    public static function getRData()
    {
        $dDateArr = array();
        $event = DB::table('orders')
            ->join('users', 'users.email', '=', 'orders.custID')
            ->select('users.*', 'orders.DueDate AS chkDate', 'orders.ordID AS id', 'orders.ordDate', 'DueDate AS chkDate', 'orders.status AS status')
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

    /**
     * Returns Dashboard View with the integer array consisting data
     * collected from the DB.
     *
     * @author Sinthujan G.
     * @return View,int array , Dashboard View object and Data to be shown on the Dashboard.
     */
    public function viewPage()
    {
        $detsArr = array();
        $detsArr['usrCount'] = DB::table('users')->count();
        $detsArr['OnOrdCount'] = DB::table('orders')->where('status', '=', 'Ongoing')->count();
        $detsArr['uniVisitors'] = DB::table('kryptonit3_counter_page_visitor')->count(DB::raw('DISTINCT visitor_id'));
        $detsArr['itemCount'] = DB::table('items')->where('status', '=', 'AC')->count();

        return view('pages.Artist.artDashBoard')->with('detsArr',$detsArr);
    }
}
