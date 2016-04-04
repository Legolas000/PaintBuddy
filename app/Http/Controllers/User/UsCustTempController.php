<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UsCustTempController extends Controller
{
    //
    public function viewCusPage()
    {
        $backDets=DB::table('ctemplates')
                    ->select('ctemplates.id','ctemplates.name','ctemplates.fileBack','ctemplates.fileFront','ctemplates.description','ctemplates.price')
                    ->where('status','=','AC')
                    ->where('type','=','Background')
                    ->get();
        $desDets = $this->custArrDesign();
//        var_dump($backDets);
        return View::make('pages.User.CustomTemp')->with('backDets',$backDets)->with('desDets',$desDets);
    }

    public function custArrDesign()
    {
        $cats = DB::table('ctempcats')->get();
        $desDets = array();
        foreach ($cats as $cat) {
            $desDets[$cat->tcatName] = DB::table('ctemplates')
                ->join('ctempcats','ctempcats.tcatID','=','ctemplates.catRef')
                ->select('ctemplates.id','ctemplates.name','ctemplates.fileDesign','ctemplates.description','ctemplates.price','ctempcats.tcatName')
                ->where('status','=','AC')
                ->where('type','=','Design')
                ->where('ctempcats.tcatName','=',$cat->tcatName)
                ->get();;
        }
//        var_dump($desDets);
//        print_r(key($desDets));
        return $desDets;
    }
}
