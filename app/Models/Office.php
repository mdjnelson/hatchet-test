<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    /**
     * @var string[]
     */
    public $fillable = [
        'name',
        'price',
        'offices',
        'tables',
        'sqm'
    ];
}
