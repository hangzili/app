<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BetModel extends Model
{
    protected $table = 'between';
    protected $primaryKey="b_id";
    public $timestamps = false;
    protected $guarded = [];
}
