<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deactive extends Model
{
    protected $table = 'deactive';
    public $timestamps = false;

    protected $fillable=[
        'email',
        'reason',

    ];
}
