<?php

namespace App\Http\Controllers\Artist;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Class ArtsPageViewController
 * @package App\Http\Controllers\Artist
 */
class ArtsPageViewController extends Controller
{

    /**
     * Retrieve data on view count for items and return to the view.
     *
     * @author Sinthujan G.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewItemCount()
    {
        $countDets = DB::select('SELECT CP.page AS \'PageName\', COUNT(CPV.page_id) AS \'PageCount\'
                                 FROM kryptonit3_counter_page_visitor CPV,kryptonit3_counter_page CP WHERE CPV.page_id = CP.id GROUP BY page_id');

        return view('pages\Artist\artPageView')->with('countDets',$countDets);
    }

    /**
     * Retreive data on view count and send it as a
     * JSON string to the view to show it on a graph
     *
     * @author Sinthujan G.
     * @return string
     */
    public function retGraphData()
    {
        $countDets = DB::select('SELECT CP.page AS \'PageName\', COUNT(CPV.page_id) AS \'PageCount\'
                                 FROM kryptonit3_counter_page_visitor CPV,kryptonit3_counter_page CP WHERE CPV.page_id = CP.id GROUP BY page_id');

        if(count($countDets) == 0)
            return 'null';

        $labels = array();
        $viewDataSet = array();

        foreach ($countDets as $view) {
            array_push($labels,$view->PageName);
            array_push($viewDataSet, $view->PageCount);
        }

        $viewData = array('labels'=>$labels, 'datasets'=> array (
            array('label'=> "Price",
                'fillColor'=> "rgba(60,141,188,0.9)",
                'strokeColor'=> "rgba(60,141,188,0.8)",
                'pointColor'=> "#3b8bba",
                'pointStrokeColor'=>"rgba(60,141,188,1)",
                'pointhighlightFill'=> "#fff",
                'pointhighlightStroke'=> "rgba(60,141,188,1)",
                'data'=>$viewDataSet)
        ));
       return json_encode($viewData);
    }
}
