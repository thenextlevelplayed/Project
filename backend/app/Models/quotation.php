<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotation extends Model
{
use HasFactory;
    public $fillable = 
        [
            'qid',
            'qdate',
            'cid',
            'qcontact',
            'cmail',
            'staffid',
            'dlid',
            'rid',
            'qstatus'
        ];
    }
