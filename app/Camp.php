<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    protected $fillable = [
        'title','price','decrabction','plus_price', 'path', 'status'
    ];

}
