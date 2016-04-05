<?php namespace App;

class Category extends BaseModel {
    protected $primaryKey = 'catID';
    protected $table = 'categories';
    protected $fillable = array('catName');
}
