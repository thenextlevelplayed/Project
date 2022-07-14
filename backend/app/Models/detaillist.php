<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detaillist extends Model
{
    use HasFactory;
    protected $table = "detaillist";
    protected $primaryKey = "dlid";
    public $timestamps = false;
}
