<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    public $fillable =
    [
        'bid',
        'sid',
        'sname',
        'bookdate',
        'staffname',
        'remark'
    ];

    protected $table = 'book';
}
