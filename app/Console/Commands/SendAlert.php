<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:artist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alert the artist when the deadline for a order comes near';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $event = DB::table('orders')
            ->join('users', 'users.email', '=', 'orders.custID')
            ->select('users.*', 'orders.DueDate AS chkDate', 'orders.ordID AS id', 'orders.ordDate', 'DueDate AS chkDate', 'orders.status AS status')
            ->get();
        foreach ($event as $eve) {                  //Get orders which have passed the dealine and are ongoing and orders which are closing the deadline.
            if (Carbon::today()->addDays(2)->eq(Carbon::parse($eve->chkDate)) OR Carbon::today()->addDays(1)->eq(Carbon::parse($eve->chkDate))
                OR Carbon::today()->eq(Carbon::parse($eve->chkDate))
            ) {
                $dDateArr[]['dLineIDs'] = $eve->id;
            } elseif (Carbon::today()->subDay()->gte(Carbon::parse($eve->chkDate)) AND $eve->status == 'Ongoing') {
                $dDateArr[]['passIDs'] = $eve->id;
            }
        }
        $msg='<h3>The following orders need your attention:- </h3><ul>';
        foreach($dDateArr as $dets) {
            if (isset($dets['dLineIDs']))
                $msg.='<li>The Order ID'.$dets['dLineIDs'].'is reaching the deadline.</li>';
            if (isset($dets['passIDs']))
                $msg.='<li>The Order ID'.$dets['passIDs'].' has passed the deadline.</li>';
        }
        $msg .='</ul>';
        if(isset($dDateArr)) {
            Mail::send(array(), array(), function ($message) use ($msg) {
                $message->from('paintbuddyProj@gmail.com', 'Admin System');
                $message->to('paintbuddyProj@gmail.com');
                $message->subject('Urgent:Alert');
                $message->setBody($msg, 'text/html');
            });
            if(count(Mail::failures()) == 0 ){
                echo 'Artist has been successfully alerted at '.Carbon::now();
            }
        }
    }

}
