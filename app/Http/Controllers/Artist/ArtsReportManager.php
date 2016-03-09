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
        $dets = array('dDate' => Request::input('pRepdRange'));
        $dets['dDate'] = str_replace(" ", "", $dets['dDate']);
        //return $dets['dDate'];
        $rules = array('dDate' => 'required');
        $messages = array('required' => 'The date range is required');
        $validator = Validator::make($dets, $rules, $messages);
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
        $engine = App::make("getReporticoEngine");
        $engine->initial_execute_mode = "EXECUTE";
        $engine->initial_report = "itemsCReport.xml";
        $engine->access_mode = "ONEREPORT";
        $engine->initial_project = "itemsCReport";
        $engine->initial_project_password = ""; // If project password required
        $engine->clear_reportico_session = true;
        $engine->initial_output_format = "PDF";
        $engine->execute();
    }


    public function genORDReport()
    {
        $dets = array('dDate' => Request::input('orddRange'));
        $dets['dDate'] = str_replace(" ", "", $dets['dDate']);
        //return $dets['dDate'];
        $rules = array('dDate' => 'required');
        $messages = array('required' => 'The date range is required');
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('artRep')->withInput()->withErrors($validator);
        }
        else {
            //return json_encode($dets);
            $engine = App::make("getReporticoEngine");
            $engine->initial_execute_mode = "EXECUTE";
            $engine->initial_report = "ordCReport.xml";
            $engine->access_mode = "ONEREPORT";
            $engine->initial_project = "ordCReport";
            $engine->initial_project_password = ""; // If project password required
            $engine->clear_reportico_session = true;
            $engine->initial_output_format = "PDF";
            $engine->initial_execution_parameters = array();
            $engine->initial_execution_parameters['orDRange'] = $dets['dDate']; //Give name given on the citeria
            $engine->execute();
        }
    }
}
