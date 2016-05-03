<?php
/**
 * Created by PhpStorm.
 * User: Sinthujan
 * Date: 19/3/2016
 * Time: 11:08 PM
 */

namespace App\Http\Controllers\Artist\DPatterns\Strategy;


use Illuminate\Support\Facades\DB;

class getInActiveUsrDets implements ArtUserDetsInterface
{
    public function load()
    {
        // TODO: Implement load() method.
        return DB::table('users')
            ->where('status','=','0')
            ->get();
    }
}