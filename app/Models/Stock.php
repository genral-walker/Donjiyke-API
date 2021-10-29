<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'kg',
        'metre_run',
        'metre_out',
        'issued_by',
        'issued_to',
        'cost',
        'balance'
    ];
}
