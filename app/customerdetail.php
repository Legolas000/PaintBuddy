<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerdetail extends Model
{
    protected $primaryKey = 'cusID';
    protected $table = 'customerdetails';
    protected $fillable = array('firstName', 'lastName', 'street','	city','zip','state','country', 'telephone','email');

    public $timestamps = false;
}
