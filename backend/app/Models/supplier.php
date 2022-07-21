<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $PrimaryKey = 'sid';
    protected $table = 'supplier';
    public $timestamps = false;
}
