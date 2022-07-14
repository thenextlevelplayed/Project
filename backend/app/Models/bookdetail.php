<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookdetail extends Model
{
    use HasFactory;
    public $fillable =
    [
        'bdetailid',
        'bid',
        'mname',
        'quantity',
        'cost',
        'stockIn'
    ];

    protected $table = 'bookdetail';
}
