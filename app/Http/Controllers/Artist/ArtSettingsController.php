<?php

namespace App\Http\Controllers\Artist;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ArtSettingsController extends Controller
{
    //

    public function exportDB()
    {
        Artisan::call('db:backup', ['--database' => 'mysql', '--destination' => 'local',
            '--destinationPath' => '\dbBck\sqlBck', '--compression' => 'null']);
        $file = storage_path('app'). "/dbBck/sqlBck";
        //$fileName = Crypt::encrypt(rand(11111,99999)).'DB_Backup.sql';
        $fileName = uniqid(Carbon::now().'DB_Backup').'.sql';
        $headers = array(
            'Content-Type: application/sql',
        );
        return Response::download($file, $fileName , $headers)->deleteFileAfterSend(true);
    }

    public function importDB()
    {
//        $file = Request::file('sql')->getRealPath();
//        return $file;
        $dets = array('sql' => Request::file('sql')->getRealPath());

        //setting up rules
        $rules = array('sql' => 'required');
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::back()->withInput()->withErrors($validator);
        }
        else {
            Artisan::call('down');
            Artisan::call('db:restore', ['--database' => 'mysql',
                '--sourcePath' => $dets['sql'], '--compression' => 'null']);
            Artisan::call('up');
            return Redirect::back()->with('success', true)->with('message', 'Item successfully added');
        }
    }
}
