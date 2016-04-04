<?php

namespace App\Http\Controllers\Artist;


use App\Exceptions\SendMailException;
use App\Http\Controllers\Artist\DPatterns\ChainOfCommand;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ArtsMailController
 * @package App\Http\Controllers\Artist
 */
class ArtsMailController extends Controller
{

    /**
     * Used to send mail from the email editor defined.
     *
     * @author Sinthujan G.
     * @return mixed Redirects to the view with Error or Success messages.
     */

    public function retMailView($type)
    {
        $values = $this->getInbox($type);
//        var_dump($values['1']);return;
        if($values['1'] == 'err1')
            return Redirect::back()->withInput()->withErrors('An error occured. Please try again.');
        else if($values['1'] == 'err2')
            return Redirect::back()->withInput()->withErrors('There are no mail to view.');
        else
            return view('pages.Artist.MailPages.MailBox')->with('emailList',$values['1'])->with('type',$values['2']);
    }

    public function sendMail()
    {
        $dets = array('msg' => Request::input('mailDets'),'subject' => Request::input('subjectH'), 'to' => Request::input('toH'), 'file' =>Request::file('file'));
        $rules = array('msg' => 'required','subject' => 'required','to' => 'required|email');
        $messages = array('msg.required' => 'The email body is required', 'to.required' => 'The recipient\'s address is required', 'to.email' => 'The recepient address is not of the correct format');
        $validator = Validator::make($dets, $rules, $messages);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::back()->withInput()->withErrors($validator);
        }
        else {
            //Get the details from the form and send it as an array to the function.
            try {
                Mail::send(array(), array(), function ($message) use ($dets) {
                    $message->from('paintbuddyProj@gmail.com', 'PaintBuddy Team');
                    $message->to($dets['to']);
                    $message->subject($dets['subject']);
                    $message->setBody($dets['msg'], 'text/html');
                    if (isset($dets['file']))
                        $message->attach(Request::file('file'), ['as' => Request::file('file')->getClientOriginalName(), 'mime' => Request::file('file')->getClientOriginalExtension()]);
                });
            }catch(\Exception $e)
            {
                throw new SendMailException($e->getMessage());
            }

            if(count(Mail::failures()) > 0 ){
                return Redirect::back()->withInput()->withErrors('Mail was not sucessfully sent. Please try again');
            }
            else
                 return Redirect::back()->with('success', true)->with('message','Mail sucessfully sent');
        }
    }

    //Added Chain of Command Design Pattern
    public function getInbox($type)
    {
       $CChain = new ChainOfCommand\CommandChain();
       $CChain->addCommand(new ChainOfCommand\getInbox());
       $CChain->addCommand(new ChainOfCommand\getSentMail());
        if($type == 1)
        {
            $detsArr = array('1' => $CChain->runCommand('getInbox', null), '2' => '1');
            return $detsArr;
        }
        if($type == 2)
        {
            $detsArr = array( '1' => $CChain->runCommand('getSentMail', null), '2' => '2');
            return $detsArr;
        }
    }




    public function viewMail($MailID, $type)
    {
//        return $MailID. ' '.$type;
        $url = null;
        if($type == 1)
            $url = '{imap.gmail.com:993/imap/ssl}INBOX';
        else if($type == 2)
            $url = '{imap.gmail.com:993/ssl}[Gmail]/Sent Mail';
        $mailboxes = array(
            'label' => 'Gmail',
            'enable' => true,
            'mailbox' => $url,
            'username' => 'paintbuddyProj@gmail.com',
            'password' => '4N?@vwJn@resijt'
        );
        $stream = imap_open($mailboxes['mailbox'], $mailboxes['username'], $mailboxes['password']);
        $message='';
        $overview='';
        if (!$stream) {
            return Redirect::back()->withInput()->withErrors('An error occured. Please try again.');
        }
        $emails = imap_search($stream,'ALL');
        foreach($emails as $item)
        {
            $overview = imap_fetch_overview($stream,$item,0);
            $message = imap_fetchbody($stream,$item,1.1);
            if($overview[0]->msgno == $MailID)
            {
                if ($message == "") { // no attachments is the usual cause of this
                    $message = imap_fetchbody($stream,$item, 1);
                }
                $str = imap_fetchstructure($stream,$item);
                preg_match('~<(.*?)>~', $overview[0]->from, $output);
                $overview[0]->from = $output[1];
               // $message = base64_decode($message);
                break;
            }
        }
        imap_close($stream);
        //echo($message);
        //var_dump($overview);
        return view('pages.Artist.MailPages.ViewMail')->with('msg',$message)->with('ovr',$overview)->with('type',$type);
    }


    public function delMail()
    {
//        return $MailID. ' '.$type;
        $url = null;
        $type = Request::input('type');
        $MailID = Request::input('msgNo');
//        return $type. ' '.$MailID;
        if($type == 1)
            $url = '{imap.gmail.com:993/imap/ssl}INBOX';
        else if($type == 2)
            $url = '{imap.gmail.com:993/ssl}[Gmail]/Sent Mail';
        $mailboxes = array(
            'label' => 'Gmail',
            'enable' => true,
            'mailbox' => $url,
            'username' => 'paintbuddyProj@gmail.com',
            'password' => '4N?@vwJn@resijt'
        );
        $stream = imap_open($mailboxes['mailbox'], $mailboxes['username'], $mailboxes['password']);
        if (!$stream) {
            return Redirect::back()->withInput()->withErrors('An error occured. Please try again.');
        }
        imap_delete($stream,$MailID);
        imap_close($stream);
        //echo($message);
        return Redirect::to('/getMailBox.type=1')->with('success', true)->with('message','Mail sucessfully deleted');
    }
}
