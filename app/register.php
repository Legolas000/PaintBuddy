<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
      protected $table = 'register';
  public $timestamps = false;

protected $fillable=[
    'FirstName',
    'InputLastName',
    'InputEmail1',
    'InputAddress',
    'InputPhone',
    'InputPWD',
    'InputREPWD'
];
}
