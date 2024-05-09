<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_statement extends Model
{
    use HasFactory;
    protected $table = 'bank_statements';
    protected $fillable = ['statement_sl', 'transaction_date', 'description', 'amount', 'balance', 'ppw_id', 'ppw_amount', 'bank_code'];
}
