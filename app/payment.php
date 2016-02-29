<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $primaryKey = 'pID';
    protected $table = 'payments';
    protected $fillable = array('payDate', 'amount', 'ioID','payMethod');

    public $timestamps = false;

}
