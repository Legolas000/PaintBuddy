<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemorder extends Model {

    protected $primaryKey = 'ioID';
    protected $table = 'itemorders';
    protected $fillable = array('itID', 'ordID', 'custID');
    public $timestamps = false;
}
