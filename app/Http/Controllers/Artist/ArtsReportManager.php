<?php

namespace App\Http\Controllers\Artist;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
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
     * Return report view to user
     *
     * @author Sinthujan G.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $custDets = DB::table('users')
                    ->where('status','=','1')
                    ->lists(DB::raw('CONCAT(name," ",lname) AS name'),'email');
        return view('pages.Artist.artMainReport')->with('custDets',$custDets);
    }

    /**
     * Generate complete payment report and send it as a PDF file.
     *
     * @author Sinthujan G.
     * @return null
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

    /**
     * Return report for Payment filtered by the Payment dates.
     *
     * @author Sinthujan G.
     * @return null
     */
    public function genCCPReport()
    {
        $dets = array('dDate' => Request::input('pRepdRange'));
        $dets['dDate'] = str_replace(" ", "", $dets['dDate']);
        $rules = array('dDate' => 'required');
        $messages = array('required' => 'The date range is required');
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('artRep')->withInput()->withErrors($validator);
        }
        else {
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

    /**
     * Generate Complete item report.
     *
     * @author Sinthujan G.
     * @return null
     */
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


    /**
     * Generate order report filtered by the order date.
     *
     * @author Sinthujan G.
     * @return null
     */
    public function genORDReport()
    {
        $dets = array('dDate' => Request::input('orddRange'));
        $dets['dDate'] = str_replace(" ", "", $dets['dDate']);
        $rules = array('dDate' => 'required');
        $messages = array('required' => 'The date range is required');
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('artRep')->withInput()->withErrors($validator);
        }
        else {
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

    /**
     * Generate order history for selected customer.
     *
     *@author Sinthujan G..
     *@return null
     */
    public function genCustOrdDets()
    {
        $dets = array('custMail' => Request::input('custMail'));
        $rules = array('custMail' => 'required');
        $messages = array('required' => 'The customer\'s mail is required');
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('artRep')->withInput()->withErrors($validator);
        }
        else {
            $engine = App::make("getReporticoEngine");
            $engine->initial_execute_mode = "EXECUTE";
            $engine->initial_report = "CustOrdDets.xml";
            $engine->access_mode = "ONEREPORT";
            $engine->initial_project = "CustOrdDets";
            $engine->initial_project_password = ""; // If project password required
            $engine->clear_reportico_session = true;
            $engine->initial_output_format = "PDF";
            $engine->initial_execution_parameters = array();
            $engine->initial_execution_parameters['cEmail'] = $dets['custMail']; //Give name given on the citeria
            $engine->execute();
        }
    }
}
