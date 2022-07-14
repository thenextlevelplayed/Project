<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detaillist extends Model
{
use HasFactory;
    public $fillable = 
        [
            'dlid',
            'qid',
            'iid',
            'rid',
            'mname',
            'quantity',
            'price',
            'mspecification',
            'mnumber',
            'remark',
            'pstatus'




        ];
    }
