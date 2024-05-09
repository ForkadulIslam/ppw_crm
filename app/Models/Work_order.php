<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_order extends Model
{
    use HasFactory;

    protected $fillable = ['ppw_id','work_order_code','sub_order_no',
        'client','client_id', 'company_id', 'company_code',
        'receive_date','contractor',
        'work_type','address','city','state','zip',
        'processor','invoice_date','seller','source_ppw','client_amount','vendor_amount'
    ];
    public function clientDetails(){
        return $this->belongsTo(Client::class,'client_id');
    }
    public function companyDetails(){
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function bankStatement(){
        return $this->hasMany(Bank_statement::class, 'ppw_id', 'ppw_id');
    }

}
