<?php

namespace App\Http\Controllers\artist;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class ArtsChartController extends Controller
{
    //
    public function view()
    {
        return view('pages\Artist\artChartView');
    }

    public function colData()
    {
//        $data = json_encode(DB::table('items')->select('price')->get());
//       //return json_encode($data);
//        //return Response::json(array('body' => View::make('pages\Artist\artChartView'), 'title' => 'My Title'));
//        //return Response::make('pages\Artist\artChartView', ['data'=>json_encode($data)]);
//        //return view('pages\Artist\artChartView',compact($data));
//        //return response()->json(['response' => 'This is get method']);
//         //return response()->json($data);
//        return response()->view('pages\Artist\artChartView');
//        // return response()->view('pages\Artist\artChartView')->json(['response' => 'This is get method']);
        $data = DB::select('SELECT DATE_FORMAT(payDate,\'%M\') as SalesMonth,
         SUM(amount) AS TotalSales
    FROM payment
GROUP BY YEAR(payDate), MONTH(payDate)
ORDER BY YEAR(payDate), MONTH(payDate)');

        //$data = DB::table('items')->select('price')->get();
        $labels = array();
        $priceDataset = array();
        $commentDataset = array();

        foreach ($data as $view) {
            array_push($labels,$view->SalesMonth);
            //array_push($labels, 'price');
            array_push($priceDataset, $view->TotalSales);
            //array_push($commentDataset, $view->comments->count());
        }

        $viewData = array('labels'=>$labels, 'datasets'=> array (
            array('label'=> "Price",
                'fillColor'=> "rgba(60,141,188,0.9)",
                'strokeColor'=> "rgba(60,141,188,0.8)",
                'pointColor'=> "#3b8bba",
                'pointStrokeColor'=>"rgba(60,141,188,1)",
                'pointhighlightFill'=> "#fff",
                'pointhighlightStroke'=> "rgba(60,141,188,1)",
                'data'=>$priceDataset)
        ));
        return (json_encode($viewData));
    }
}
