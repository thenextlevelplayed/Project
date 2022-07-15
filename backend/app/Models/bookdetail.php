<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookdetail extends Model
{
    use HasFactory;
    protected $table = 'bookdetail';    
    protected $primaryKey = 'bDetailId';
    public $timestamps = false;
}
