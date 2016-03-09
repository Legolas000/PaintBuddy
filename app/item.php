<?php

namespace App;

class Item extends BaseModel {
    protected $primaryKey = 'itID';
    protected $table = 'items';
    protected $fillable = array('itName', 'itDescrip', 'imPath','itSize','catRef','price','status');
}
