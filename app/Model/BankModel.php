<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    protected $table="bank";
    protected $primaryKey = 'bank_id';
    public $timestamps=false;
    protected $guarded = [];
}
