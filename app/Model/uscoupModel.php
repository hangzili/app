<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class uscoupModel extends Model
{
    protected $table="user_coupons";
    protected $primaryKey = 'u_c_id';
    public $timestamps=false;
    protected $guarded = [];
}
