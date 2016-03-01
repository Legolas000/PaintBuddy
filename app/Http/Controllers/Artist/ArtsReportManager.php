<?php

namespace App\Http\Controllers\Artist;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
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
    public function genCPReport()
    {

//        $database = \Config::get('database.connections.mysql');
//        $output = public_path() . '/report/'.time().'_artsPayment';
//
//        $ext = "pdf";
//
//        \JasperPHP\Facades\JasperPHP::process(
//            public_path() . '/report/artsPayment.jasper',
//            $output,
//            array($ext),
//            array(),
//            $database,
//            false,
//            false
//        )->execute();
//
//        header('Content-Description: File Transfer');
//        header('Content-Type: application/octet-stream');
//        header('Content-Disposition: attachment; filename='.time().'_artsPayment.'.$ext);
//        header('Content-Transfer-Encoding: binary');
//        header('Expires: 0');
//        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//        header('Pragma: public');
//        header('Content-Length: ' . filesize($output.'.'.$ext));
//        flush();
//        readfile($output.'.'.$ext);
//        unlink($output.'.'.$ext); // deletes the temporary file
//        return Redirect::to('/reporting');
        $engine = App::make("getReporticoEngine");
        $engine->initial_execute_mode = "EXECUTE";
        $engine->initial_report = "PaymentReport.xml";
        $engine->access_mode = "ONEREPORT";
        $engine->initial_project = "PaymentReport";
        $engine->initial_project_password = ""; // If project password required
        $engine->clear_reportico_session = true;
        $engine->initial_output_format = "PDF";
        $engine->execute();
    }

    public function genCCPReport()
    {
        $dets = array('dDate' => Request::input('dRange'));
        $dets['dDate'] = str_replace(" ", "", $dets['dDate']);
        //return $dets['dDate'];
        $rules = array('dDate' => 'required');
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('artRep')->withInput()->withErrors($validator);
        }
        else {
            //return json_encode($dets);
            $engine = App::make("getReporticoEngine");
            $engine->initial_execute_mode = "EXECUTE";
            $engine->initial_report = "CPaymentReport.xml";
            $engine->access_mode = "ONEREPORT";
            $engine->initial_project = "CPaymentReport";
            $engine->initial_project_password = ""; // If project password required
            $engine->clear_reportico_session = true;
            $engine->initial_output_format = "PDF";
            $engine->initial_execution_parameters = array();
            $engine->initial_execution_parameters['DRange'] = $dets['dDate']; //Give name given on the citeria
            $engine->execute();
        }
    }

    public function genItReport()
    {

    }
}
