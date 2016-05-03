<?php
/**
 * Created by PhpStorm.
 * User: Sinthujan
 * Date: 22/3/2016
 * Time: 2:09 AM
 */

namespace App\Http\Controllers\Artist\DPatterns\Strategy;


use Illuminate\Support\Facades\DB;

class getCustUsrDets implements ArtUserDetsInterface
{

    public function load()
    {
        // TODO: Implement load() method.
        return DB::table('users')
            ->where('status','=','1')
            ->where('role','=','customer')
            ->get();
    }
}