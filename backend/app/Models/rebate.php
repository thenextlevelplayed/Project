<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rebate extends Model
{
use HasFactory;
    public $fillable = 
        [
            'rid',
            'rtitle',
            'rcontent',
        ];
    }
