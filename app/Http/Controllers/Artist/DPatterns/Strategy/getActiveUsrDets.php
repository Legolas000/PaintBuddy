<?php
/**
 * Created by PhpStorm.
 * User: Sinthujan
 * Date: 19/3/2016
 * Time: 11:07 PM
 */

namespace App\Http\Controllers\Artist\DPatterns\Strategy;


use Illuminate\Support\Facades\DB;

class getActiveUsrDets implements ArtUserDetsInterface
{
    public function load()
    {
        // TODO: Implement load() method.
        return  DB::table('users')
            ->where('status','=','1')
            ->get();
    }

}