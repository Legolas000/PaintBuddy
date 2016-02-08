<?php

namespace App\Http\Controllers\Artist;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JasperPHP\JasperPHP;

/**
 * Class ArtsReportManager
 * @package App\Http\Controllers\Artist
 */
class ArtsReportManager extends Controller
{
    //
    /**
     * ArtsReportManager constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.Artist.artMainReport');
    }


    /**
     * @return mixed
     */
    public function genPaymentReport()
    {

        $database = \Config::get('database.connections.mysql');
        $output = public_path() . '/report/'.time().'_artsPayment';

        $ext = "pdf";

        \JasperPHP\Facades\JasperPHP::process(
            public_path() . '/report/artsPayment.jasper',
            $output,
            array($ext),
            array(),
            $database,
            false,
            false
        )->execute();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.time().'_artsPayment.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext); // deletes the temporary file

        return Redirect::to('/reporting');
    }
}
