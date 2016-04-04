<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Artist\DPatterns\Strategy\ArtUserDetsClient;
use App\Http\Controllers\Artist\DPatterns\Strategy\getActiveUsrDets;
use App\Http\Controllers\Artist\DPatterns\Strategy\getAdminUsrDets;
use App\Http\Controllers\Artist\DPatterns\Strategy\getCustUsrDets;
use App\Http\Controllers\Artist\DPatterns\Strategy\getInActiveUsrDets;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArtUserDetsController extends Controller
{

    //Follows Strategy Design pattern.
    public function getActiveUsrDets()
    {
//        $usrDets = DB::table('users')
//                   ->where('status','=','1')
//                   ->get();
        $client = new ArtUserDetsClient();
        $client->setOutput(new getActiveUsrDets());
        $usrDets = $client->loadOutput();
        return view('pages.Artist.artUsrDets')->with('usrDets',$usrDets);
    }

    //Follows Strategy design pattern.
    public function getInActiveUsrDets()
    {
//        $usrDets = DB::table('users')
//            ->where('status','=','0')
//            ->get();
        $client = new ArtUserDetsClient();
        $client->setOutput(new getInActiveUsrDets());
        $usrDets = $client->loadOutput();
        return view('pages.Artist.artUsrDets')->with('usrDets',$usrDets);
    }

    public function getAdminUsrDets()
    {
//        $usrDets = DB::table('users')
//            ->where('status','=','1')
//            ->where('role','=','admin')
//            ->get();
        $client = new ArtUserDetsClient();
        $client->setOutput(new getAdminUsrDets());
        $usrDets = $client->loadOutput();
        return view('pages.Artist.artUsrDets')->with('usrDets',$usrDets);
    }

    public function getCustUsrDets()
    {
//        $usrDets = DB::table('users')
//            ->where('status','=','1')
//            ->where('role','=','customer')
//            ->get();
        $client = new ArtUserDetsClient();
        $client->setOutput(new getCustUsrDets());
        $usrDets = $client->loadOutput();
        return view('pages.Artist.artUsrDets')->with('usrDets',$usrDets);
    }
}
