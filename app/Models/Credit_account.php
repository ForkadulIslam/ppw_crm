<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit_account extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','name','account_no','branch'
    ];
}
