<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CouModel extends Model
{
    protected $table="coupons";
    protected $primaryKey = 'cou_id';
    public $timestamps=false;
    protected $guarded = [];
}
