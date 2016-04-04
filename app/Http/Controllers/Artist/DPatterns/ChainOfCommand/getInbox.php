<?php
/**
 * Created by PhpStorm.
 * User: Sinthujan
 * Date: 20/3/2016
 * Time: 12:01 AM
 */

namespace App\Http\Controllers\Artist\DPatterns\ChainOfCommand;


use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class getInbox implements ICommand
{
    public function onCommand($name, $args)
    {
        // TODO: Implement onCommand() method.
        if($name != 'getInbox')
            return false;
        return true;
    }

    // TODO: GET return data code here

    public function getMailBox()
    {
        $mailboxes = array(
            'label' => 'Gmail',
            'enable' => true,
            'mailbox' => '{imap.gmail.com:993/imap/ssl}INBOX',
            'username' => 'paintbuddyProj@gmail.com',
            'password' => '4N?@vwJn@resijt'
        );
        $stream = imap_open($mailboxes['mailbox'], $mailboxes['username'], $mailboxes['password']);

        if (!$stream) {
            return 'err1';
            //return Redirect::back()->withInput()->withErrors('An error occured. Please try again.');
        }
        $emails = imap_search($stream,'ALL');

        if(!$emails)
            return 'err2';
            //return Redirect::back()->withInput()->withErrors('There are no mail to view.');
        else
            rsort($emails);
        $emailList = array();
        $count = 0;
        foreach($emails as $item)
        {
            $overview = imap_fetch_overview($stream,$item,0);
            $emailList[$count] = $overview;
            $emailList[$count]['agoTime']=Carbon::createFromTimestampUTC(strtotime($overview[0]->date))->diffForHumans();
            $count++;
        }
        imap_close($stream);

        return $emailList;
    }

}