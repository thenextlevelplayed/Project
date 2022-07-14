<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookdetail extends Model
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
    }
