<?php

namespace App\Http\Controllers\Artist;


use App\Http\Controllers\Controller;
use Html2Text\Html2Text;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ArtsMailController extends Controller
{
    //
    public function showMailInt()
    {
        return view('\pages\Artist\artMailPage');
    }

    public function sendMail()
    {
        $dets = array('msg' => Request::input('mailDets'),'subject' => Request::input('subjectH'), 'to' => Request::input('toH'), 'file' =>Request::file('file'));

        //return json_encode($msg);
        $rules = array('msg' => 'required','subject' => 'required','to' => 'required|email');
        $validator = Validator::make($dets, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('mail')->withInput()->withErrors($validator);
        }
        else {
            Mail::send(array(),array(), function ($message) use ($dets) {

                $message->from('paintbuddyProj@gmail.com', 'PaintBuddy Team');
                $message->to($dets['to']);
                $message->subject($dets['subject']);
                $message->setBody($dets['msg'], 'text/html');
                if(isset($dets['file']))
                  $message->attach(Request::file('file'), ['as' => 	Request::file('file')->getClientOriginalName(), 'mime' => Request::file('file')->getClientOriginalExtension()]);
                //$message->to('laevateinn92@gmail.com');
            });
            if(count(Mail::failures()) > 0 ){
                return Redirect::to('mail')->withInput()->withErrors('Mail was not sucessfully sent. Please try again');
            }
            else
                 return Redirect::to('mail')->with('success', true)->with('message','Mail sucessfully sent');
        }
    }
}
