<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class customerdetail extends Model {

    protected $primaryKey = 'cusID';
    protected $table = 'customerdetails';
    protected $fillable = array('fullName', 'city', 'locationType','phoneNo','addressLine1','addressLine2','delDate','email');
    public $timestamps = false;

}
