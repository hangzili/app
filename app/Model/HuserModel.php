<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HuserModel extends Model
{
    protected $table = 'huser';
	protected $primaryKey = 'u_id';
	public $timestamps = false;
	protected $guarded = [];
}
