<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';  
    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'        

    ];
}
