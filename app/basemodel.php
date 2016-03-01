<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class basemodel extends Model
{
    public function selectQuery($sql_stmt) {
        return DB::select($sql_stmt);
    }

    public function sqlStatement($sql_stmt) {
        DB::statement($sql_stmt);
    }
}
