<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
use HasFactory;
    public $fillable = 
        [
            'iid',
            'mid',
            'mname',
            'mnumber',
            'sid',
            'mspecification',
            'cost',
            'sumquantity',
            'bdetailid',
            'quantity',




        ];
    }
